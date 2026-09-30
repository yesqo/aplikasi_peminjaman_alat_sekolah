<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $siswa = Siswa::all();
        return view('petugas.siswa.index', compact('siswa'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('petugas.siswa.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nis' => 'required|unique:siswas,nis',
            'nama_siswa' => 'required|max:100',
            'kelas' => 'required|max:50',
            'no_telp' => 'nullable|max:20',
            'username' => 'required|unique:siswas,username',
            'password' => 'required|min:6',
        ]);

        Siswa::create([
            'nis' => $request->nis,
            'nama_siswa' => $request->nama_siswa,
            'kelas' => $request->kelas,
            'no_telp' => $request->no_telp,
            'username' => $request->username,
            'password' => bcrypt($request->password),
        ]);

        return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil ditambah');
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
        $siswa = Siswa::find($id);
        return view('petugas.siswa.edit', compact('siswa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nis' => 'required|unique:siswas,nis,' . $id,
            'nama_siswa' => 'required|max:100',
            'kelas' => 'required|max:50',
            'no_telp' => 'nullable|max:20',
            'username' => 'required|unique:siswas,username,' . $id,
        ]);

        $siswa = Siswa::find($id);
        $siswa->update([
            'nis' => $request->nis,
            'nama_siswa' => $request->nama_siswa,
            'kelas' => $request->kelas,
            'no_telp' => $request->no_telp,
            'username' => $request->username,
            'password' => $request->password ? bcrypt($request->password) : $siswa->password,
        ]);

        return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil diedit');
    }

    public function destroy(string $id)
    {
        $siswa = Siswa::find($id);
        $siswa->delete();
        return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil dihapus');
    }
}
