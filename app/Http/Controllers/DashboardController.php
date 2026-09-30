<?php

namespace App\Http\Controllers;

use App\Models\Alat;
use App\Models\Kategori;
use App\Models\Peminjaman;
use App\Models\Pengembalian;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $total_alat = Alat::count();
        $total_kategori = Kategori::count();
        $total_dipinjam = Peminjaman::where('status', 'Dipinjam')->count();
        $total_menunggu = Peminjaman::where('status', 'Menunggu Persetujuan')->count();
        $total_dikembalikan = Pengembalian::where('status', 'Dikonfirmasi')->count();
        $total_menunggu_pengembalian = Pengembalian::where('status', 'Menunggu Konfirmasi')->count();

        $history_peminjaman = Peminjaman::latest()->take(5)->get();
        $history_pengembalian = Pengembalian::latest()->take(5)->get();

        return view('petugas.dashboard', compact(
            'total_alat',
            'total_kategori',
            'total_dipinjam',
            'total_menunggu',
            'total_dikembalikan',
            'total_menunggu_pengembalian',
            'history_peminjaman',
            'history_pengembalian'
        ));
    }

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
