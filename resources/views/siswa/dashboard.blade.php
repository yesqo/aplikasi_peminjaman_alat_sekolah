@extends('siswa.layouts.master')
@section('title', 'Dashboard')
@section('content')

    <div class="container-fluid py-4">

        {{-- HEADER DASHBOARD --}}
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-body p-4">

                        <div class="d-flex justify-content-between align-items-center flex-wrap">

                            <div>
                                <h4 class="font-weight-bolder mb-1">
                                    Dashboard Siswa
                                </h4>

                                <p class="text-sm mb-0 text-secondary">
                                    Selamat datang,
                                    <span class="font-weight-bold text-dark">
                                        {{ $siswa->nama_siswa }}
                                    </span>
                                    ({{ $siswa->kelas }})
                                </p>
                            </div>

                            <div class="mt-3 mt-md-0">
                                <a href="{{ route('portal.peminjaman.create') }}" class="btn bg-gradient-primary mb-0">

                                    <i class="fas fa-plus me-2"></i>
                                    Ajukan Peminjaman Baru

                                </a>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>


        {{-- STATISTIK --}}
        <div class="row">

            {{-- TOTAL ALAT --}}
            <div class="col-xl-3 col-md-6 mb-4">

                <div class="card h-100">

                    <div class="card-body p-3">

                        <div class="row">

                            <div class="col-8">

                                <div class="numbers">

                                    <p class="text-sm mb-0 text-uppercase font-weight-bold">
                                        Total Alat Tersedia
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

                    <a href="{{ route('portal.alat') }}"
                        class="card-footer text-decoration-none px-3 pb-3 pt-0 text-sm text-primary">

                        Lihat alat
                        <i class="fas fa-arrow-right ms-1"></i>

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
                                        {{ $total_menunggu_saya }}
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

                    <a href="{{ route('portal.riwayat.index') }}"
                        class="card-footer text-decoration-none px-3 pb-3 pt-0 text-sm text-primary">

                        Lihat riwayat
                        <i class="fas fa-arrow-right ms-1"></i>

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
                                        Sedang Saya Pinjam
                                    </p>

                                    <h5 class="font-weight-bolder mb-0">
                                        {{ $total_dipinjam_saya }}
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

                    <a href="{{ route('portal.riwayat.index') }}"
                        class="card-footer text-decoration-none px-3 pb-3 pt-0 text-sm text-primary">

                        Lihat peminjaman
                        <i class="fas fa-arrow-right ms-1"></i>

                    </a>

                </div>

            </div>


            {{-- TOTAL RIWAYAT --}}
            <div class="col-xl-3 col-md-6 mb-4">

                <div class="card h-100">

                    <div class="card-body p-3">

                        <div class="row">

                            <div class="col-8">

                                <div class="numbers">

                                    <p class="text-sm mb-0 text-uppercase font-weight-bold">
                                        Total Riwayat
                                    </p>

                                    <h5 class="font-weight-bolder mb-0">
                                        {{ $total_riwayat_saya }}
                                    </h5>

                                </div>

                            </div>

                            <div class="col-4 text-end">

                                <div class="icon icon-shape bg-gradient-danger shadow-danger text-center rounded-circle">

                                    <i class="ni ni-time-alarm text-lg opacity-10" aria-hidden="true"></i>

                                </div>

                            </div>

                        </div>

                    </div>

                    <a href="{{ route('portal.riwayat.index') }}"
                        class="card-footer text-decoration-none px-3 pb-3 pt-0 text-sm text-primary">

                        Lihat riwayat
                        <i class="fas fa-arrow-right ms-1"></i>

                    </a>

                </div>

            </div>

        </div>


        {{-- RIWAYAT PEMINJAMAN TERBARU --}}
        <div class="row mt-2">

            <div class="col-12 mb-4">

                <div class="card">

                    <div class="card-header pb-0 p-3">

                        <div class="d-flex justify-content-between align-items-center">

                            <h6 class="mb-0">
                                Riwayat Peminjaman Terbaru
                            </h6>

                            <a href="{{ route('portal.riwayat.index') }}" class="text-primary text-sm font-weight-bold">

                                Lihat Semua
                                <i class="fas fa-arrow-right ms-1"></i>

                            </a>

                        </div>

                    </div>


                    <div class="table-responsive">

                        @if ($riwayat_terbaru->isEmpty())

                            <div class="text-center py-5">

                                <div
                                    class="icon icon-shape bg-gradient-secondary shadow-secondary text-center rounded-circle mb-3 mx-auto">

                                    <i class="ni ni-archive-2 text-lg opacity-10"></i>

                                </div>

                                <h6 class="font-weight-bolder">
                                    Belum Ada Riwayat Peminjaman
                                </h6>

                                <p class="text-sm text-secondary mb-3">
                                    Kamu belum pernah meminjam alat apapun.
                                </p>

                                <a href="{{ route('portal.alat') }}" class="btn btn-sm bg-gradient-primary mb-0">

                                    Mulai Pinjam Alat
                                    <i class="fas fa-arrow-right ms-1"></i>

                                </a>

                            </div>
                        @else
                            <table class="table align-items-center mb-0">

                                <thead>

                                    <tr>

                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-3">
                                            Nama Alat
                                        </th>

                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Tanggal Pinjam
                                        </th>

                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Jumlah
                                        </th>

                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Status
                                        </th>

                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-end pe-3">
                                            Aksi
                                        </th>

                                    </tr>

                                </thead>


                                <tbody>

                                    @foreach ($riwayat_terbaru as $r)
                                        <tr>

                                            {{-- NAMA ALAT --}}
                                            <td class="ps-3">

                                                <div class="d-flex px-2 py-1">

                                                    <div class="d-flex flex-column justify-content-center">

                                                        <h6 class="mb-0 text-sm">
                                                            {{ $r->alat->nama_alat ?? '-' }}
                                                        </h6>

                                                    </div>

                                                </div>

                                            </td>


                                            {{-- TANGGAL --}}
                                            <td>

                                                <p class="text-sm font-weight-bold mb-0">
                                                    {{ $r->tanggal_peminjaman }}
                                                </p>

                                            </td>


                                            {{-- JUMLAH --}}
                                            <td>

                                                <p class="text-sm font-weight-bold mb-0">
                                                    {{ $r->jumlah }}
                                                </p>

                                            </td>


                                            {{-- STATUS --}}
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


                                            {{-- DETAIL --}}
                                            <td class="text-end pe-3">

                                                <a href="{{ route('portal.riwayat.show', $r->id) }}"
                                                    class="btn btn-sm bg-gradient-info mb-0">

                                                    <i class="fas fa-eye me-1"></i>
                                                    Detail

                                                </a>

                                            </td>

                                        </tr>
                                    @endforeach

                                </tbody>

                            </table>

                        @endif

                    </div>

                </div>

            </div>

        </div>

    </div>

@endsection
