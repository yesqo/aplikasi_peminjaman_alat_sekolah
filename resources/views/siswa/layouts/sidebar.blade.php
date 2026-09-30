<aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4"
    id="sidenav-main">

    <div class="sidenav-header">

        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>

        <a class="navbar-brand m-0" href="{{ route('portal.dashboard') }}">

            <span class="ms-1 font-weight-bold">
                Peminjaman Alat Sekolah
            </span>

        </a>

    </div>

    <hr class="horizontal dark mt-0">

    <div class="collapse navbar-collapse w-auto" id="sidenav-collapse-main"
        style="height: auto !important; overflow: visible !important;">

        <ul class="navbar-nav">

            {{-- DASHBOARD --}}
            <li class="nav-item">

                <a class="nav-link {{ request()->routeIs('portal.dashboard') ? 'active' : '' }}"
                    href="{{ route('portal.dashboard') }}">

                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">

                        <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>

                    </div>

                    <span class="nav-link-text ms-1">
                        Dashboard
                    </span>

                </a>

            </li>


            {{-- PEMINJAMAN --}}
            <li class="nav-item mt-3">

                <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">
                    Peminjaman
                </h6>

            </li>


            {{-- DAFTAR ALAT --}}
            <li class="nav-item">

                <a class="nav-link {{ request()->routeIs('portal.alat') ? 'active' : '' }}"
                    href="{{ route('portal.alat') }}">

                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">

                        <i class="ni ni-box-2 text-info text-sm opacity-10"></i>

                    </div>

                    <span class="nav-link-text ms-1">
                        Daftar Alat
                    </span>

                </a>

            </li>


            {{-- AJUKAN PEMINJAMAN --}}
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('portal.peminjaman.create') ? 'active' : '' }}"
                    href="{{ route('portal.peminjaman.create') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-send text-primary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Ajukan Peminjaman</span>
                </a>
            </li>

            {{-- AJUKAN PENGEMBALIAN --}}
            <li class="nav-item">

                <a class="nav-link {{ request()->routeIs('portal.pengembalian.*') ? 'active' : '' }}"
                    href="{{ route('portal.pengembalian.create') }}">

                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">

                        <i class="ni ni-curved-next text-danger text-sm opacity-10"></i>

                    </div>

                    <span class="nav-link-text ms-1">
                        Ajukan Pengembalian
                    </span>

                </a>

            </li>


            {{-- RIWAYAT --}}
            <li class="nav-item mt-3">

                <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">
                    Riwayat
                </h6>

            </li>


            <li class="nav-item">

                <a class="nav-link {{ request()->routeIs('portal.riwayat.*') ? 'active' : '' }}"
                    href="{{ route('portal.riwayat.index') }}">

                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-time-alarm text-warning text-sm opacity-10"></i>
                    </div>

                    <span class="nav-link-text ms-1">
                        Riwayat Peminjaman
                    </span>

                </a>

            </li>


            {{-- AKUN --}}
            <li class="nav-item mt-3">

                <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">
                    Akun
                </h6>

            </li>


            {{-- LOGOUT --}}
            <li class="nav-item">
                <a class="nav-link" href="{{ route('logout.siswa') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-user-run text-danger text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Logout</span>
                </a>
            </li>
        </ul>

    </div>

</aside>
