@extends('petugas.layouts.master')
@section('title', 'Data Pengembalian')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header pb-0 d-flex justify-content-between align-items-center">
                <h6>Tabel Pengembalian</h6>
                <a href="{{ route('pengembalian.create') }}" class="btn btn-primary btn-sm mb-0">
                    <i class="fas fa-plus"></i> Tambah Pengembalian Manual
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
                                <th class="text-uppercase text-xs font-weight-bolder">Tgl Kembali</th>
                                <th class="text-uppercase text-xs font-weight-bolder">Jumlah</th>
                                <th class="text-uppercase text-xs font-weight-bolder">Status</th>
                                <th class="text-uppercase text-xs font-weight-bolder">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pengembalian as $pg)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $pg->peminjaman->siswa->nama_siswa ?? '-' }}</td>
                                <td>{{ $pg->peminjaman->alat->nama_alat ?? '-' }}</td>
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
                                <td>
                                    @if ($pg->status == 'Menunggu Konfirmasi')
                                        <a href="{{ route('pengembalian.confirm', $pg->id) }}" onclick="return confirm('Konfirmasi barang sudah diterima ?')" class="btn btn-success btn-sm mb-0">
                                            <i class="fas fa-check"></i> Konfirmasi
                                        </a>
                                        <a href="{{ route('pengembalian.reject', $pg->id) }}" onclick="return confirm('Tolak klaim pengembalian ini ?')" class="btn btn-danger btn-sm mb-0">
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
