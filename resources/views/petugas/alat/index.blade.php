@extends('petugas.layouts.master')
@section('title', 'Data Alat')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="col-sm-6">
                <h2 class="m-2 text-white">Tabel Alat</h2>
            </div>
        <div class="card mb-4">
            <div class="card-header pb-0 d-flex justify-content-between align-items-center">
                <h6>Tabel Alat</h6>
                <a href="{{ route('alat.create') }}" class="btn btn-primary btn-sm mb-0">
                    <i class="fas fa-plus"></i> Tambah Data Alat
                </a>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
                <div class="table-responsive p-3">
                    <table id="example1" class="table align-items-center mb-0">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-xs font-weight-bolder">#</th>
                                <th class="text-uppercase text-xs font-weight-bolder">Gambar</th>
                                <th class="text-uppercase text-xs font-weight-bolder">Nama Alat</th>
                                <th class="text-uppercase text-xs font-weight-bolder">Kategori</th>
                                <th class="text-uppercase text-xs font-weight-bolder">Stok</th>
                                <th class="text-uppercase text-xs font-weight-bolder">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($alat as $a)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    @empty($a->gambar)
                                        <img src="{{ url('image/nophoto.jpg') }}" alt="" class="rounded" style="width: 100%; max-width: 80px; height: auto;">
                                    @else
                                        <img src="{{ url('image') }}/{{ $a->gambar }}" alt="" class="rounded" style="width: 100%; max-width: 80px; height: auto;">
                                    @endempty
                                </td>
                                <td>{{ $a->nama_alat }}</td>
                                <td>{{ $a->kategori->nama_kategori ?? '-' }}</td>
                                <td>{{ $a->stok }}</td>
                                <td>
                                    <a href="{{ route('alat.edit', $a->id) }}" class="btn btn-warning btn-sm mb-0">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <a href="{{ route('alat.destroy', $a->id) }}" onclick="return confirm('Yakin mau hapus data ini ?')" class="btn btn-danger btn-sm mb-0">
                                        <i class="fas fa-trash"></i> Hapus
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
