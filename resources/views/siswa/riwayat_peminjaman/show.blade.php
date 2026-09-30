@extends('siswa.layouts.master')
@section('title', 'Detail Peminjaman')
@section('content')
<div class="row">
    <div class="col-lg-8 col-12 mx-auto">
        <div class="card mb-4">
            <div class="card-header pb-0">
                <h5>Informasi Peminjaman</h5>
            </div>
            <div class="card-body">
                <table class="table table-borderless mb-0">
                    <tr>
                        <th style="width: 220px;">Nama Alat</th>
                        <td>: {{ $peminjaman->alat->nama_alat ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th>Kategori</th>
                        <td>: {{ $peminjaman->alat->kategori->nama_kategori ?? '-' }}</td>
                    </tr>
                    <tr>
                        <th>Tanggal Peminjaman</th>
                        <td>: {{ $peminjaman->tanggal_peminjaman }}</td>
                    </tr>
                    <tr>
                        <th>Rencana Tanggal Kembali</th>
                        <td>: {{ $peminjaman->tanggal_rencana_kembali }}</td>
                    </tr>
                    <tr>
                        <th>Jumlah Dipinjam</th>
                        <td>: {{ $peminjaman->jumlah }}</td>
                    </tr>
                    <tr>
                        <th>Sisa Belum Dikembalikan</th>
                        <td>: <strong>{{ $peminjaman->sisa_belum_kembali }}</strong></td>
                    </tr>
                    <tr>
                        <th>Diproses Oleh</th>
                        <td>: {{ $peminjaman->petugas->nama_petugas ?? 'Belum diproses' }}</td>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <td>:
                            @if ($peminjaman->status == 'Menunggu Persetujuan')
                                <span class="badge bg-gradient-secondary">{{ $peminjaman->status }}</span>
                            @elseif ($peminjaman->status == 'Dipinjam')
                                <span class="badge bg-gradient-warning">{{ $peminjaman->status }}</span>
                            @elseif ($peminjaman->status == 'Dikembalikan Sebagian')
                                <span class="badge bg-gradient-info">{{ $peminjaman->status }}</span>
                            @elseif ($peminjaman->status == 'Ditolak')
                                <span class="badge bg-gradient-danger">{{ $peminjaman->status }}</span>
                            @else
                                <span class="badge bg-gradient-success">{{ $peminjaman->status }}</span>
                            @endif
                        </td>
                    </tr>
                </table>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-header pb-0">
                <h6>Riwayat Klaim Pengembalian</h6>
            </div>
            <div class="card-body">
                @if ($peminjaman->pengembalian->isEmpty())
                    <div class="alert alert-warning mb-0">Alat ini belum pernah diajukan pengembalian.</div>
                @else
                <div class="table-responsive">
                    <table class="table align-items-center mb-0">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-xs font-weight-bolder">Tanggal</th>
                                <th class="text-uppercase text-xs font-weight-bolder">Jumlah</th>
                                <th class="text-uppercase text-xs font-weight-bolder">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($peminjaman->pengembalian as $pg)
                            <tr>
                                <td>{{ $pg->tanggal_pengembalian }}</td>
                                <td>{{ $pg->jumlah }}</td>
                                <td>
                                    @if ($pg->status == 'Menunggu Konfirmasi')
                                        <span class="badge bg-gradient-secondary">{{ $pg->status }}</span>
                                    @elseif ($pg->status == 'Dikonfirmasi')
                                        <span class="badge bg-gradient-success">{{ $pg->status }}</span>
                                    @else
                                        <span class="badge bg-gradient-danger">{{ $pg->status }}</span>
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

        <div class="mb-4">
            @if (in_array($peminjaman->status, ['Dipinjam', 'Dikembalikan Sebagian']) && $peminjaman->sisa_belum_kembali > 0)
                <a class="btn btn-primary" href="{{ route('portal.pengembalian.create', ['peminjaman_id' => $peminjaman->id]) }}">
                    <i class="fas fa-undo"></i> Ajukan Pengembalian
                </a>
            @endif
            <a class="btn btn-secondary" href="{{ route('portal.riwayat.index') }}">
                <i class="fas fa-arrow-left"></i> Kembali ke Riwayat
            </a>
        </div>
    </div>
</div>
@endsection
