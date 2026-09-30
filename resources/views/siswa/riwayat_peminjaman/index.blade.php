@extends('siswa.layouts.master')
@section('title', 'Riwayat Peminjaman')
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h2 class="m-0 text-white">Riwayat Peminjaman</h2>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('portal.dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Riwayat Peminjaman</li>
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
                            <h6 class="card-title">Riwayat Peminjaman Saya</h6>
                        </div>
                        <div class="card-body">
                            @if ($riwayat->isEmpty())
                                <div class="alert alert-secondary text-center mb-0">
                                    Belum ada riwayat peminjaman
                                </div>
                            @else
                                <div class="table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Nama Alat</th>
                                                <th>Tgl Pinjam</th>
                                                <th>Jumlah Pinjam</th>
                                                <th>Sisa Belum Kembali</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($riwayat as $r)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $r->alat->nama_alat ?? '-' }}</td>
                                                    <td>{{ $r->tanggal_peminjaman }}</td>
                                                    <td>{{ $r->jumlah }}</td>
                                                    <td>{{ $r->sisa_belum_kembali }}</td>
                                                    <td>
                                                        @if ($r->status == 'Menunggu Persetujuan')
                                                            <span class="badge badge-sm bg-gradient-secondary">
                                                                {{ $r->status }}
                                                            </span>
                                                        @elseif ($r->status == 'Dipinjam')
                                                            <span class="badge badge-sm bg-gradient-warning">
                                                                {{ $r->status }}
                                                            </span>
                                                        @elseif ($r->status == 'Dikembalikan Sebagian')
                                                            <span class="badge badge-sm bg-gradient-info">
                                                                {{ $r->status }}
                                                            </span>
                                                        @elseif ($r->status == 'Ditolak')
                                                            <span class="badge badge-sm bg-gradient-danger">
                                                                {{ $r->status }}
                                                            </span>
                                                        @else
                                                            <span class="badge badge-sm bg-gradient-success">
                                                                {{ $r->status }}
                                                            </span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <a class="btn btn-info btn-sm"
                                                            href="{{ route('portal.riwayat.show', $r->id) }}">
                                                            <i class="fas fa-eye"></i> Detail
                                                        </a>

                                                        @if (in_array($r->status, ['Dipinjam', 'Dikembalikan Sebagian']) && $r->sisa_belum_kembali > 0)
                                                            <a class="btn btn-primary btn-sm"
                                                                href="{{ route('portal.pengembalian.create', ['peminjaman_id' => $r->id]) }}">
                                                                <i class="fas fa-undo"></i> Kembalikan
                                                            </a>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
