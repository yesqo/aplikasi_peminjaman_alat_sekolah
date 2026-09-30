<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use App\Models\Peminjaman;
use App\Models\Pengembalian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PengembalianController extends Controller
{
    public function create(Request $request)
    {
        $siswa = Auth::guard('siswa')->user();

        $peminjaman = Peminjaman::where('id_siswa', $siswa->id)
            ->whereIn('status', ['Dipinjam', 'Dikembalikan Sebagian'])
            ->get()
            ->filter(fn ($p) => $p->sisa_belum_kembali > 0)
            ->values();

        $selected = $request->query('peminjaman_id');

        return view('siswa.pengembalian.create', compact('peminjaman', 'selected'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_peminjaman' => 'required|exists:peminjamans,id',
            'tanggal_pengembalian' => 'required|date',
            'jumlah' => 'required|integer|min:1',
        ]);

        $siswa = Auth::guard('siswa')->user();
        $peminjaman = Peminjaman::where('id_siswa', $siswa->id)->findOrFail($request->id_peminjaman);

        if (!in_array($peminjaman->status, ['Dipinjam', 'Dikembalikan Sebagian'])) {
            return redirect()->route('portal.pengembalian.create')
                ->with('error', 'Peminjaman ini tidak bisa diajukan pengembalian');
        }

        if ($request->jumlah > $peminjaman->sisa_belum_kembali) {
            return redirect()->route('portal.pengembalian.create')
                ->with('error', 'Jumlah melebihi sisa yang belum dikembalikan (' . $peminjaman->sisa_belum_kembali . ')');
        }

        Pengembalian::create([
            'id_peminjaman' => $peminjaman->id,
            'tanggal_pengembalian' => $request->tanggal_pengembalian,
            'jumlah' => $request->jumlah,
            'status' => 'Menunggu Konfirmasi',
        ]);

        return redirect()->route('portal.riwayat.index')
            ->with('success', 'Pengajuan pengembalian berhasil dikirim, menunggu konfirmasi petugas');
    }
}
