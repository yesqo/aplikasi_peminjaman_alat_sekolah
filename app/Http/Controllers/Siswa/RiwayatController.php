<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use App\Models\Peminjaman;
use Illuminate\Support\Facades\Auth;

class RiwayatController extends Controller
{
    public function index()
    {
        $siswa = Auth::guard('siswa')->user();
        $riwayat = Peminjaman::where('id_siswa', $siswa->id)->latest()->get();
        return view('siswa.riwayat_peminjaman.index', compact('riwayat'));
    }

    public function show(string $id)
    {
        $siswa = Auth::guard('siswa')->user();
        // where() + findOrFail() memastikan siswa tidak bisa lihat riwayat milik siswa lain
        $peminjaman = Peminjaman::where('id_siswa', $siswa->id)->findOrFail($id);
        return view('siswa.riwayat_peminjaman.show', compact('peminjaman'));
    }
}
