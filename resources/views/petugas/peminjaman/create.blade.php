@extends('petugas.layouts.master')
@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6"><h2 class="m-2 text-white">Tambah Peminjaman</h2></div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Tambah Peminjaman</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header"><h6 class="card-title">Form Tambah Peminjaman</h6></div>
                    <div class="card-body">
                        <form action="{{ route('peminjaman.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Siswa</label>
                                <select class="form-control" name="id_siswa">
                                    <option value="">Pilih Siswa</option>
                                    @foreach ($siswa as $s)
                                        <option value="{{ $s->id }}" {{ old('id_siswa') == $s->id ? 'selected' : '' }}>
                                            {{ $s->nama_siswa }} - {{ $s->kelas }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('id_siswa')<div class="alert alert-danger mt-2">{{ $message }}</div>@enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Alat</label>
                                <select class="form-control" name="id_alat">
                                    <option value="">Pilih Alat</option>
                                    @foreach ($alat as $a)
                                        <option value="{{ $a->id }}" {{ old('id_alat') == $a->id ? 'selected' : '' }}>
                                            {{ $a->nama_alat }} (Stok: {{ $a->stok }})
                                        </option>
                                    @endforeach
                                </select>
                                @error('id_alat')<div class="alert alert-danger mt-2">{{ $message }}</div>@enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Tanggal Peminjaman</label>
                                <input type="date" class="form-control" name="tanggal_peminjaman"
                                    value="{{ old('tanggal_peminjaman', date('Y-m-d')) }}">
                                @error('tanggal_peminjaman')<div class="alert alert-danger mt-2">{{ $message }}</div>@enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Rencana Tanggal Kembali</label>
                                <input type="date" class="form-control" name="tanggal_rencana_kembali"
                                    value="{{ old('tanggal_rencana_kembali') }}">
                                @error('tanggal_rencana_kembali')<div class="alert alert-danger mt-2">{{ $message }}</div>@enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Jumlah</label>
                                <input type="number" class="form-control" name="jumlah" value="{{ old('jumlah', 1) }}">
                                @error('jumlah')<div class="alert alert-danger mt-2">{{ $message }}</div>@enderror
                            </div>
                            <button class="btn btn-primary" type="submit"><i class="fas fa-save"></i> Simpan</button>
                            <a class="btn btn-warning" href="{{ route('peminjaman.index') }}">Kembali ke Peminjaman</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
