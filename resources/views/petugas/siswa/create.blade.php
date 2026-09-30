@extends('petugas.layouts.master')
@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6"><h2 class="m-0 text-white">Tambah Siswa</h2></div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Tambah Siswa</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header"><h6 class="card-title">Form Tambah Siswa</h6></div>
                    <div class="card-body">
                        <form action="{{ route('siswa.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">NIS</label>
                                <input type="text" class="form-control" name="nis" value="{{ old('nis') }}">
                                @error('nis')<div class="alert alert-danger mt-2">{{ $message }}</div>@enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Nama Siswa</label>
                                <input type="text" class="form-control" name="nama_siswa" value="{{ old('nama_siswa') }}">
                                @error('nama_siswa')<div class="alert alert-danger mt-2">{{ $message }}</div>@enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Kelas</label>
                                <input type="text" class="form-control" name="kelas" value="{{ old('kelas') }}">
                                @error('kelas')<div class="alert alert-danger mt-2">{{ $message }}</div>@enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">No Telp</label>
                                <input type="text" class="form-control" name="no_telp" value="{{ old('no_telp') }}">
                                @error('no_telp')<div class="alert alert-danger mt-2">{{ $message }}</div>@enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Username</label>
                                <input type="text" class="form-control" name="username" value="{{ old('username') }}">
                                @error('username')<div class="alert alert-danger mt-2">{{ $message }}</div>@enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Password</label>
                                <input type="password" class="form-control" name="password">
                                @error('password')<div class="alert alert-danger mt-2">{{ $message }}</div>@enderror
                            </div>
                            <button class="btn btn-primary" type="submit"><i class="fas fa-save"></i> Simpan</button>
                            <a class="btn btn-warning" href="{{ route('siswa.index') }}">Kembali ke Halaman Siswa</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
