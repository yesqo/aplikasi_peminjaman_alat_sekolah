<?php

namespace App\Http\Controllers;

use App\Models\Petugas;
use Illuminate\Http\Request;

class PetugasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $petugas = Petugas::all();
        return view('petugas.petugas.index', compact('petugas'));
    }

    public function create()
    {
        return view('petugas.petugas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_petugas' => 'required|max:100',
            'username' => 'required|unique:petugas,username',
            'password' => 'required',
        ]);

        Petugas::create([
            'nama_petugas' => $request->nama_petugas,
            'username' => $request->username,
            'password' => bcrypt($request->password),
        ]);

        return redirect()->route('petugas.index')->with('success', 'Data Berhasil ditambah');
    }

    public function edit(string $id)
    {
        $petugas = Petugas::find($id);
        return view('petugas.petugas.edit', compact('petugas'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_petugas' => 'required|max:100',
            'username' => 'required',
        ]);

        $petugas = Petugas::find($id);
        $petugas->update([
            'nama_petugas' => $request->nama_petugas,
            'username' => $request->username,
            'password' => $request->password ? bcrypt($request->password) : $petugas->password,
        ]);

        return redirect()->route('petugas.index')->with('success', 'Data Berhasil di edit');
    }

    public function destroy(string $id)
    {
        $petugas = Petugas::find($id);
        $petugas->delete();
        return redirect()->route('petugas.index')->with('success', 'Data Berhasil di hapus');
    }
}
