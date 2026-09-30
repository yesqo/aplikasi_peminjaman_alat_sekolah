<?php

namespace App\Http\Controllers;

use App\Models\Alat;
use App\Models\Kategori;
use Illuminate\Http\Request;

class AlatController extends Controller
{
    public function index()
    {
        $alat = Alat::all();
        return view('petugas.alat.index', compact('alat'));
    }

    public function create()
    {
        $kategori = Kategori::all();
        return view('petugas.alat.create', compact('kategori'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'gambar'      => 'nullable|image|mimes:jpg,png,jpeg|max:4096',
            'id_kategori' => 'required',
            'nama_alat'   => 'required|max:100',
            'stok'        => 'required|numeric',
        ]);

        if (!empty($request->gambar)) {
            $fileName = 'alat-' . uniqid() . '.' . $request->gambar->extension();
            $request->gambar->move(public_path('image'), $fileName);
        } else {
            $fileName = 'nophoto.jpg';
        }

        Alat::create([
            'gambar'      => $fileName,
            'id_kategori' => $request->id_kategori,
            'nama_alat'   => $request->nama_alat,
            'stok'        => $request->stok,
        ]);

        return redirect()->route('alat.index')->with('success', 'Alat berhasil ditambah');
    }

    public function edit(string $id)
    {
        $kategori = Kategori::all();
        $alat = Alat::find($id);
        return view('petugas.alat.edit', compact('alat', 'kategori'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'gambar'      => 'nullable|image|mimes:jpg,png,jpeg|max:4096',
            'id_kategori' => 'required',
            'nama_alat'   => 'required|max:100',
            'stok'        => 'required|numeric',
        ]);

        $alat = Alat::findOrFail($id);

        if (!empty($request->gambar)) {
            if ($alat->gambar && $alat->gambar != 'nophoto.jpg' && file_exists(public_path('image/' . $alat->gambar))) {
                unlink(public_path('image/' . $alat->gambar));
            }
            $fileName = 'alat-' . uniqid() . '.' . $request->gambar->extension();
            $request->gambar->move(public_path('image'), $fileName);
        } else {
            $fileName = $alat->gambar;
        }

        $alat->update([
            'gambar'      => $fileName,
            'id_kategori' => $request->id_kategori,
            'nama_alat'   => $request->nama_alat,
            'stok'        => $request->stok,
        ]);

        return redirect()->route('alat.index')->with('success', 'Alat berhasil diupdate');
    }

    public function destroy(string $id)
    {
        $alat = Alat::find($id);

        if ($alat->gambar && $alat->gambar != 'nophoto.jpg' && file_exists(public_path('image/' . $alat->gambar))) {
            unlink(public_path('image/' . $alat->gambar));
        }

        $alat->delete();
        return redirect()->route('alat.index')->with('success', 'Alat berhasil dihapus');
    }
}
