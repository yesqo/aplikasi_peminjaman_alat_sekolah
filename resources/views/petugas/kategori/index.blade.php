@extends('petugas.layouts.master')
@section('title', 'Data Kategori')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="col-sm-6">
                <h2 class="m-2 text-white">Data Kategori</h2>
            </div>
        <div class="card mb-4">
            <div class="card-header pb-0 d-flex justify-content-between align-items-center">
                <h6>Tabel Kategori</h6>
                <a href="{{ route('kategori.create') }}" class="btn btn-primary btn-sm mb-0">
                    <i class="fas fa-plus"></i> Tambah Data Kategori
                </a>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
                <div class="table-responsive p-3">
                    <table id="example1" class="table align-items-center mb-0">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-xs font-weight-bolder">#</th>
                                <th class="text-uppercase text-xs font-weight-bolder">Nama Kategori</th>
                                <th class="text-uppercase text-xs font-weight-bolder">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kategori as $k)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $k->nama_kategori }}</td>
                                <td>
                                    <a href="{{ route('kategori.edit', $k->id) }}" class="btn btn-warning btn-sm mb-0">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <a href="{{ route('kategori.destroy', $k->id) }}" onclick="return confirm('Yakin mau hapus data ini ?')" class="btn btn-danger btn-sm mb-0">
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
