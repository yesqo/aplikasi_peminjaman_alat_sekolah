<?php

namespace App\Http\Controllers;

use App\Models\Pengembalian;
use App\Models\Peminjaman;
use Illuminate\Http\Request;

class PengembalianController extends Controller
{
    public function index()
    {
        $pengembalian = Pengembalian::latest()->get();
        return view('petugas.pengembalian.index', compact('pengembalian'));
    }

    public function create()
    {
        $peminjaman = Peminjaman::whereIn('status', ['Dipinjam', 'Dikembalikan Sebagian'])
            ->get()
            ->filter(fn ($p) => $p->sisa_belum_kembali > 0)
            ->values();

        return view('petugas.pengembalian.create', compact('peminjaman'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_peminjaman' => 'required|exists:peminjamans,id',
            'tanggal_pengembalian' => 'required|date',
            'jumlah' => 'required|integer|min:1',
        ]);

        $peminjaman = Peminjaman::findOrFail($request->id_peminjaman);

        if ($request->jumlah > $peminjaman->sisa_belum_kembali) {
            return redirect()->route('pengembalian.create')
                ->with('error', 'Jumlah melebihi sisa yang belum dikembalikan (' . $peminjaman->sisa_belum_kembali . ')');
        }

        $pengembalian = Pengembalian::create([
            'id_peminjaman' => $peminjaman->id,
            'tanggal_pengembalian' => $request->tanggal_pengembalian,
            'jumlah' => $request->jumlah,
            'status' => 'Dikonfirmasi',
        ]);

        $this->prosesKonfirmasi($peminjaman, $pengembalian);

        return redirect()->route('pengembalian.index')->with('success', 'Pengembalian berhasil dicatat');
    }

    public function confirm(string $id)
    {
        $pengembalian = Pengembalian::findOrFail($id);

        if ($pengembalian->status != 'Menunggu Konfirmasi') {
            return redirect()->route('pengembalian.index')->with('error', 'Pengajuan ini sudah diproses sebelumnya');
        }

        $peminjaman = $pengembalian->peminjaman;
        $pengembalian->update(['status' => 'Dikonfirmasi']);

        $this->prosesKonfirmasi($peminjaman, $pengembalian);

        return redirect()->route('pengembalian.index')->with('success', 'Pengembalian dikonfirmasi, stok alat diperbarui');
    }

    public function reject(string $id)
    {
        $pengembalian = Pengembalian::findOrFail($id);

        if ($pengembalian->status != 'Menunggu Konfirmasi') {
            return redirect()->route('pengembalian.index')->with('error', 'Pengajuan ini sudah diproses sebelumnya');
        }

        $pengembalian->update(['status' => 'Ditolak']);

        return redirect()->route('pengembalian.index')->with('success', 'Klaim pengembalian ditolak');
    }

    private function prosesKonfirmasi(Peminjaman $peminjaman, Pengembalian $pengembalian)
    {
        $peminjaman->alat->increment('stok', $pengembalian->jumlah);

        $totalDikembalikan = (int) Pengembalian::where('id_peminjaman', $peminjaman->id)
            ->where('status', 'Dikonfirmasi')
            ->sum('jumlah');

        $jumlahDipinjam = (int) $peminjaman->jumlah;

        if ($totalDikembalikan >= $jumlahDipinjam) {
            $peminjaman->status = 'Dikembalikan';
        } else {
            $peminjaman->status = 'Dikembalikan Sebagian';
        }

        $peminjaman->save();
    }
}
