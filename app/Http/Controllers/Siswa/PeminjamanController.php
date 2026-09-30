<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use App\Models\Alat;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $alat = Alat::where('stok', '>', 0)->get();
        $selected_alat = $request->query('alat_id');
        return view('siswa.peminjaman.create', compact('alat', 'selected_alat'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_alat' => 'required|exists:alats,id',
            'tanggal_peminjaman' => 'required|date|after_or_equal:today',
            'tanggal_rencana_kembali' => 'required|date|after_or_equal:tanggal_peminjaman',
            'jumlah' => 'required|integer|min:1',
        ]);

        $siswa = Auth::guard('siswa')->user();
        $alat = Alat::findOrFail($request->id_alat);

        // validasi awal - stok baru benar-benar dipotong saat petugas menyetujui
        if ($alat->stok < $request->jumlah) {
            return redirect()->route('portal.peminjaman.create')
                ->with('error', 'Stok alat tidak mencukupi, sisa stok: ' . $alat->stok);
        }

        Peminjaman::create([
            'id_siswa' => $siswa->id,
            'id_alat' => $request->id_alat,
            'tanggal_peminjaman' => $request->tanggal_peminjaman,
            'tanggal_rencana_kembali' => $request->tanggal_rencana_kembali,
            'jumlah' => $request->jumlah,
            'status' => 'Menunggu Persetujuan',
        ]);

        return redirect()->route('portal.riwayat.index')
            ->with('success', 'Pengajuan peminjaman berhasil dikirim, menunggu persetujuan petugas');
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
