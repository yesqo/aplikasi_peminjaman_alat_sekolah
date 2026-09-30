@extends('petugas.layouts.master')
@section('title', 'Data Petugas')
@section('content')
<div class="row">
    <div class="col-12">
         <div class="col-sm-6">
                <h2 class="m-2 text-white">Data Petugas</h2>
            </div>
        <div class="card mb-4">

            <div class="card-header pb-0 d-flex justify-content-between align-items-center">
                <h6>Tabel Petugas</h6>
                <a href="{{ route('petugas.create') }}" class="btn btn-primary btn-sm mb-0">
                    <i class="fas fa-plus"></i> Tambah Data Petugas
                </a>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
                <div class="table-responsive p-3">
                    <table id="example1" class="table align-items-center mb-0">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-xs font-weight-bolder">#</th>
                                <th class="text-uppercase text-xs font-weight-bolder">Nama Petugas</th>
                                <th class="text-uppercase text-xs font-weight-bolder">Username</th>
                                <th class="text-uppercase text-xs font-weight-bolder">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($petugas as $p)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $p->nama_petugas }}</td>
                                <td>{{ $p->username }}</td>
                                <td>
                                    <a href="{{ route('petugas.edit', $p->id) }}" class="btn btn-warning btn-sm mb-0">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <a href="{{ route('petugas.destroy', $p->id) }}" onclick="return confirm('Yakin mau hapus data ini ?')" class="btn btn-danger btn-sm mb-0">
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
