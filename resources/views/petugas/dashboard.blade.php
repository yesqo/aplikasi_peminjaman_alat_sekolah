@extends('petugas.layouts.master')
@section('title', 'Dashboard')
@section('content')

    <div class="container-fluid py-0">

        ```
        {{-- STATISTIK DASHBOARD --}}
        <div class="row">

            {{-- JUMLAH ALAT --}}
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card h-100">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-uppercase font-weight-bold">
                                        Jumlah Alat
                                    </p>
                                    <h5 class="font-weight-bolder mb-0">
                                        {{ $total_alat }}
                                    </h5>
                                </div>
                            </div>

                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-info shadow-info text-center rounded-circle">
                                    <i class="ni ni-box-2 text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <a href="{{ route('alat.index') }}"
                        class="card-footer text-decoration-none px-3 pb-3 pt-0 text-sm text-primary">
                        Kelola alat <i class="fas fa-arrow-right ms-1"></i>
                    </a>
                </div>
            </div>


            {{-- MENUNGGU PERSETUJUAN --}}
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card h-100">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-uppercase font-weight-bold">
                                        Menunggu Persetujuan
                                    </p>
                                    <h5 class="font-weight-bolder mb-0">
                                        {{ $total_menunggu }}
                                    </h5>
                                </div>
                            </div>

                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-warning shadow-warning text-center rounded-circle">
                                    <i class="ni ni-watch-time text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <a href="{{ route('peminjaman.index') }}"
                        class="card-footer text-decoration-none px-3 pb-3 pt-0 text-sm text-primary">
                        Proses sekarang <i class="fas fa-arrow-right ms-1"></i>
                    </a>
                </div>
            </div>


            {{-- SEDANG DIPINJAM --}}
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card h-100">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-uppercase font-weight-bold">
                                        Sedang Dipinjam
                                    </p>
                                    <h5 class="font-weight-bolder mb-0">
                                        {{ $total_dipinjam }}
                                    </h5>
                                </div>
                            </div>

                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                                    <i class="ni ni-briefcase-24 text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <a href="{{ route('peminjaman.index') }}"
                        class="card-footer text-decoration-none px-3 pb-3 pt-0 text-sm text-primary">
                        Lihat peminjaman <i class="fas fa-arrow-right ms-1"></i>
                    </a>
                </div>
            </div>


            {{-- TOTAL DIKEMBALIKAN --}}
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card h-100">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-uppercase font-weight-bold">
                                        Total Dikembalikan
                                    </p>
                                    <h5 class="font-weight-bolder mb-0">
                                        {{ $total_dikembalikan }}
                                    </h5>
                                </div>
                            </div>

                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-gradient-success shadow-success text-center rounded-circle">
                                    <i class="ni ni-check-bold text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <a href="{{ route('pengembalian.index') }}"
                        class="card-footer text-decoration-none px-3 pb-3 pt-0 text-sm text-primary">
                        Lihat pengembalian <i class="fas fa-arrow-right ms-1"></i>
                    </a>
                </div>
            </div>

        </div>


        {{-- HISTORY PEMINJAMAN --}}
        <div class="row mt-2">
            <div class="col-12 mb-4">
                <div class="card">

                    <div class="card-header pb-0 p-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <h6 class="mb-0">
                                History Terakhir - Peminjaman
                            </h6>

                            <a href="{{ route('peminjaman.index') }}" class="text-primary text-sm font-weight-bold">
                                Lihat Semua
                            </a>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table align-items-center mb-0">

                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-3">
                                        Nama Siswa
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Nama Alat
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Jumlah
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Tanggal Pinjam
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Status
                                    </th>
                                </tr>
                            </thead>

                            <tbody>

                                @forelse ($history_peminjaman as $h)
                                    <tr>
                                        <td class="ps-3">
                                            <div class="d-flex px-2 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">
                                                        {{ $h->siswa->nama_siswa ?? '-' }}
                                                    </h6>
                                                </div>
                                            </div>
                                        </td>

                                        <td>
                                            <p class="text-sm font-weight-bold mb-0">
                                                {{ $h->alat->nama_alat ?? '-' }}
                                            </p>
                                        </td>

                                        <td>
                                            <p class="text-sm font-weight-bold mb-0">
                                                {{ $h->jumlah }}
                                            </p>
                                        </td>

                                        <td>
                                            <p class="text-sm font-weight-bold mb-0">
                                                {{ $h->tanggal_peminjaman }}
                                            </p>
                                        </td>

                                        <td>
                                            @if ($h->status == 'Menunggu Persetujuan')
                                                <span class="badge bg-gradient-secondary">{{ $h->status }}</span>
                                            @elseif ($h->status == 'Dipinjam')
                                                <span class="badge bg-gradient-warning">{{ $h->status }}</span>
                                            @elseif ($h->status == 'Dikembalikan Sebagian')
                                                <span class="badge bg-gradient-info">{{ $h->status }}</span>
                                            @elseif ($h->status == 'Ditolak')
                                                <span class="badge bg-gradient-danger">{{ $h->status }}</span>
                                            @else
                                                <span class="badge bg-gradient-success">{{ $h->status }}</span>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center py-4">
                                            <p class="text-sm text-secondary mb-0">
                                                Belum ada data peminjaman
                                            </p>
                                        </td>
                                    </tr>
                                @endforelse

                            </tbody>

                        </table>
                    </div>

                </div>
            </div>
        </div>


        {{-- HISTORY PENGEMBALIAN --}}
        <div class="row">
            <div class="col-12 mb-4">
                <div class="card">

                    <div class="card-header pb-0 p-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <h6 class="mb-0">
                                History Terakhir - Pengembalian
                            </h6>

                            <a href="{{ route('pengembalian.index') }}" class="text-primary text-sm font-weight-bold">
                                Lihat Semua
                            </a>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table align-items-center mb-0">

                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-3">
                                        Nama Siswa
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Nama Alat
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Jumlah
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Tanggal Kembali
                                    </th>
                                </tr>
                            </thead>

                            <tbody>

                                @forelse ($history_pengembalian as $h)
                                    <tr>
                                        <td class="ps-3">
                                            <div class="d-flex px-2 py-1">
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">
                                                        {{ $h->peminjaman->siswa->nama_siswa ?? '-' }}
                                                    </h6>
                                                </div>
                                            </div>
                                        </td>

                                        <td>
                                            <p class="text-sm font-weight-bold mb-0">
                                                {{ $h->peminjaman->alat->nama_alat ?? '-' }}
                                            </p>
                                        </td>

                                        <td>
                                            <p class="text-sm font-weight-bold mb-0">
                                                {{ $h->jumlah }}
                                            </p>
                                        </td>

                                        <td>
                                            <p class="text-sm font-weight-bold mb-0">
                                                {{ $h->tanggal_pengembalian }}
                                            </p>
                                        </td>
                                    </tr>

                                @empty

                                    <tr>
                                        <td colspan="4" class="text-center py-4">
                                            <p class="text-sm text-secondary mb-0">
                                                Belum ada data pengembalian
                                            </p>
                                        </td>
                                    </tr>
                                @endforelse

                            </tbody>

                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection
