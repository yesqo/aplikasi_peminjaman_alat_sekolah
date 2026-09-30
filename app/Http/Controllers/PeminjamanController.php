<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use App\Models\Siswa;
use App\Models\Alat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PeminjamanController extends Controller
{
    public function index()
    {
        $peminjaman = Peminjaman::latest()->get();
        return view('petugas.peminjaman.index', compact('peminjaman'));
    }

    public function create()
    {
        $siswa = Siswa::all();
        $alat = Alat::all();
        return view('petugas.peminjaman.create', compact('siswa', 'alat'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_siswa' => 'required',
            'id_alat' => 'required',
            'tanggal_peminjaman' => 'required|date',
            'tanggal_rencana_kembali' => 'required|date|after_or_equal:tanggal_peminjaman',
            'jumlah' => 'required|integer|min:1',
        ]);

        $alat = Alat::find($request->id_alat);

        if ($alat->stok < $request->jumlah) {
            return redirect()->route('peminjaman.create')
                ->with('error', 'Stok alat tidak mencukupi, sisa stok: ' . $alat->stok);
        }

        $alat->decrement('stok', $request->jumlah);

        Peminjaman::create([
            'id_siswa' => $request->id_siswa,
            'id_alat' => $request->id_alat,
            'id_petugas' => Auth::guard('petugas')->id(),
            'tanggal_peminjaman' => $request->tanggal_peminjaman,
            'tanggal_rencana_kembali' => $request->tanggal_rencana_kembali,
            'jumlah' => $request->jumlah,
            'status' => 'Dipinjam',
        ]);

        return redirect()->route('peminjaman.index')->with('success', 'Peminjaman berhasil ditambahkan');
    }

    public function approve(string $id)
    {
        $peminjaman = Peminjaman::findOrFail($id);

        if ($peminjaman->status != 'Menunggu Persetujuan') {
            return redirect()->route('peminjaman.index')->with('error', 'Pengajuan ini sudah diproses sebelumnya');
        }

        $alat = $peminjaman->alat;

        if ($alat->stok < $peminjaman->jumlah) {
            return redirect()->route('peminjaman.index')
                ->with('error', 'Stok alat tidak mencukupi untuk menyetujui pengajuan ini (sisa stok: ' . $alat->stok . ')');
        }

        $alat->decrement('stok', $peminjaman->jumlah);
        $peminjaman->update([
            'status' => 'Dipinjam',
            'id_petugas' => Auth::guard('petugas')->id(),
        ]);

        return redirect()->route('peminjaman.index')->with('success', 'Pengajuan peminjaman disetujui');
    }

    public function reject(string $id)
    {
        $peminjaman = Peminjaman::findOrFail($id);

        if ($peminjaman->status != 'Menunggu Persetujuan') {
            return redirect()->route('peminjaman.index')->with('error', 'Pengajuan ini sudah diproses sebelumnya');
        }

        $peminjaman->update([
            'status' => 'Ditolak',
            'id_petugas' => Auth::guard('petugas')->id(),
        ]);

        return redirect()->route('peminjaman.index')->with('success', 'Pengajuan peminjaman ditolak');
    }
}
