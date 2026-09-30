<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use App\Models\Alat;
use App\Models\Peminjaman;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $siswa = Auth::guard('siswa')->user();

        $total_alat = Alat::count();
        $total_menunggu_saya = Peminjaman::where('id_siswa', $siswa->id)
            ->where('status', 'Menunggu Persetujuan')
            ->count();
        $total_dipinjam_saya = Peminjaman::where('id_siswa', $siswa->id)
            ->where('status', 'Dipinjam')
            ->count();
        $total_riwayat_saya = Peminjaman::where('id_siswa', $siswa->id)->count();

        $riwayat_terbaru = Peminjaman::where('id_siswa', $siswa->id)
            ->latest()
            ->take(5)
            ->get();

        return view('siswa.dashboard', compact(
            'siswa',
            'total_alat',
            'total_menunggu_saya',
            'total_dipinjam_saya',
            'total_riwayat_saya',
            'riwayat_terbaru'
        ));
    }
}
