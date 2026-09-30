@extends('petugas.layouts.master')
@section('title', 'Data Peminjaman')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header pb-0 d-flex justify-content-between align-items-center">
                <h6>Tabel Peminjaman</h6>
                <a href="{{ route('peminjaman.create') }}" class="btn btn-primary btn-sm mb-0">
                    <i class="fas fa-plus"></i> Tambah Peminjaman Manual
                </a>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
                <div class="table-responsive p-3">
                    <table id="example1" class="table align-items-center mb-0">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-xs font-weight-bolder">#</th>
                                <th class="text-uppercase text-xs font-weight-bolder">Nama Siswa</th>
                                <th class="text-uppercase text-xs font-weight-bolder">Nama Alat</th>
                                <th class="text-uppercase text-xs font-weight-bolder">Tgl Pinjam</th>
                                <th class="text-uppercase text-xs font-weight-bolder">Jumlah</th>
                                <th class="text-uppercase text-xs font-weight-bolder">Status</th>
                                <th class="text-uppercase text-xs font-weight-bolder">Diproses Oleh</th>
                                <th class="text-uppercase text-xs font-weight-bolder">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($peminjaman as $p)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $p->siswa->nama_siswa ?? '-' }}</td>
                                <td>{{ $p->alat->nama_alat ?? '-' }}</td>
                                <td>{{ $p->tanggal_peminjaman }}</td>
                                <td>{{ $p->jumlah }}</td>
                                <td>
                                    @if ($p->status == 'Menunggu Persetujuan')
                                        <span class="badge bg-gradient-secondary">{{ $p->status }}</span>
                                    @elseif ($p->status == 'Dipinjam')
                                        <span class="badge bg-gradient-warning">{{ $p->status }}</span>
                                    @elseif ($p->status == 'Dikembalikan Sebagian')
                                        <span class="badge bg-gradient-info">{{ $p->status }}</span>
                                    @elseif ($p->status == 'Ditolak')
                                        <span class="badge bg-gradient-danger">{{ $p->status }}</span>
                                    @else
                                        <span class="badge bg-gradient-success">{{ $p->status }}</span>
                                    @endif
                                </td>
                                <td>{{ $p->petugas->nama_petugas ?? '-' }}</td>
                                <td>
                                    @if ($p->status == 'Menunggu Persetujuan')
                                        <a href="{{ route('peminjaman.approve', $p->id) }}" onclick="return confirm('Setujui pengajuan ini ?')" class="btn btn-success btn-sm mb-0">
                                            <i class="fas fa-check"></i> Setujui
                                        </a>
                                        <a href="{{ route('peminjaman.reject', $p->id) }}" onclick="return confirm('Tolak pengajuan ini ?')" class="btn btn-danger btn-sm mb-0">
                                            <i class="fas fa-times"></i> Tolak
                                        </a>
                                    @else
                                        <span class="text-muted">-</span>
                                    @endif
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
