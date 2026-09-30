@extends('siswa.layouts.master')
@section('title', 'Ajukan Peminjaman')
@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6"><h2 class="m-0 text-white">Ajukan Peminjaman</h2></div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('portal.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Ajukan Peminjaman</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h6 class="card-title">Form Pengajuan Peminjaman Alat</h6>
                    </div>
                    <div class="card-body">
                        @if ($alat->isEmpty())
                            <div class="alert alert-warning">Tidak ada alat yang tersedia untuk dipinjam saat ini.</div>
                        @endif
                        <form action="{{ route('portal.peminjaman.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Pilih Alat</label>
                                <select class="form-control" name="id_alat">
                                    <option value="">Pilih Alat</option>
                                    @foreach ($alat as $a)
                                        <option value="{{ $a->id }}" {{ (old('id_alat', $selected_alat) == $a->id) ? 'selected' : '' }}>
                                            {{ $a->nama_alat }} (Stok tersedia: {{ $a->stok }})
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
                            <button class="btn btn-primary" type="submit"><i class="fas fa-paper-plane"></i> Ajukan Peminjaman</button>
                            <a class="btn btn-warning" href="{{ route('portal.alat') }}">Kembali ke Daftar Alat</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
