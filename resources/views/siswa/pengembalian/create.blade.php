@extends('siswa.layouts.master')
@section('title', 'Ajukan Pengembalian')
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h2 class="m-0 text-white">Ajukan Pengembalian</h2>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('portal.dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Ajukan Pengembalian</li>
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
                            <h6 class="card-title">Form Pengajuan Pengembalian Alat</h6>
                        </div>
                        <div class="card-body">
                            @if ($peminjaman->isEmpty())
                                <div class="alert alert-warning">Tidak ada alat yang masih bisa kamu kembalikan saat ini.
                                </div>
                            @endif
                            <form action="{{ route('portal.pengembalian.store') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label">Pilih Peminjaman</label>
                                    <select class="form-control" name="id_peminjaman">
                                        <option value="">Pilih Peminjaman</option>
                                        @foreach ($peminjaman as $p)
                                            <option value="{{ $p->id }}"
                                                {{ old('id_peminjaman', $selected) == $p->id ? 'selected' : '' }}>
                                                {{ $p->alat->nama_alat ?? '-' }} (Sisa belum dikembalikan:
                                                {{ $p->sisa_belum_kembali }})
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('id_peminjaman')
                                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Tanggal Pengembalian</label>
                                    <input type="date" class="form-control" name="tanggal_pengembalian"
                                        value="{{ old('tanggal_pengembalian', date('Y-m-d')) }}">
                                    @error('tanggal_pengembalian')
                                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Jumlah Dikembalikan</label>
                                    <input type="number" class="form-control" name="jumlah" value="{{ old('jumlah', 1) }}"
                                        min="1">
                                    @error('jumlah')
                                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                                    @enderror
                                    <small class="form-text text-muted">Pastikan jumlah tidak melebihi sisa yang belum
                                        dikembalikan.</small>
                                </div>
                                <button class="btn btn-primary" type="submit"><i class="fas fa-paper-plane"></i> Ajukan
                                    Pengembalian</button>
                                <a class="btn btn-warning" href="{{ route('portal.riwayat.index') }}">Kembali ke
                                    Riwayat</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
