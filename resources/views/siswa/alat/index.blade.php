@extends('siswa.layouts.master')
@section('title', 'Daftar Alat')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="col-sm-6">
                <h2 class="m-2 text-white">Tabel Alat</h2>
            </div>
        <div class="card mb-4">
            <div class="card-header pb-0">
                <h6>Alat yang Tersedia di Sekolah</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
                <div class="table-responsive p-3">
                    <table id="example1" class="table align-items-center mb-0">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-xs font-weight-bolder">#</th>
                                <th class="text-uppercase text-xs font-weight-bolder">Gambar</th>
                                <th class="text-uppercase text-xs font-weight-bolder">Nama Alat</th>
                                <th class="text-uppercase text-xs font-weight-bolder">Kategori</th>
                                <th class="text-uppercase text-xs font-weight-bolder">Stok Tersedia</th>
                                <th class="text-uppercase text-xs font-weight-bolder">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($alat as $a)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    @empty($a->gambar)
                                        <img src="{{ url('image/nophoto.jpg') }}" alt="" class="rounded" style="width: 100%; max-width: 80px; height: auto;">
                                    @else
                                        <img src="{{ url('image') }}/{{ $a->gambar }}" alt="" class="rounded" style="width: 100%; max-width: 80px; height: auto;">
                                    @endempty
                                </td>
                                <td>{{ $a->nama_alat }}</td>
                                <td>{{ $a->kategori->nama_kategori ?? '-' }}</td>
                                <td>
                                    @if ($a->stok > 0)
                                        <span class="badge bg-gradient-success">{{ $a->stok }}</span>
                                    @else
                                        <span class="badge bg-gradient-danger">Habis</span>
                                    @endif
                                </td>
                                <td>
                                    @if ($a->stok > 0)
                                        <a href="{{ route('portal.peminjaman.create', ['alat_id' => $a->id]) }}" class="btn btn-primary btn-sm mb-0">
                                            <i class="fas fa-hand-holding"></i> Pinjam
                                        </a>
                                    @else
                                        <span class="text-muted">Stok Habis</span>
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
