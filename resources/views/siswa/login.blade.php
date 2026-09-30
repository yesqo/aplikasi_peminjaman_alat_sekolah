<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login Siswa - Peminjaman Alat Sekolah</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <link href="{{ asset('assets/css/nucleo-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/nucleo-svg.css') }}" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link id="pagestyle" href="{{ asset('assets/css/argon-dashboard.css') }}" rel="stylesheet" />
</head>

<body class="bg-gray-200">
    <main class="main-content mt-0">
        <div class="page-header align-items-start min-vh-100"
            style="background-image: url('{{ asset('assets/img/curved-images/curved14.jpg') }}');">
            <span class="mask bg-gradient-primary opacity-6"></span>
            <div class="container my-auto">
                <div class="row">
                    <div class="col-lg-4 col-md-8 col-12 mx-auto">
                        <div class="card z-index-0 fadeIn3 fadeInBottom">
                            <div class="card-header text-center pt-4">
                                <h4 class="font-weight-bolder">
                                    Peminjaman Alat Sekolah
                                </h4>
                                <p class="mb-0">
                                    Login sebagai <b>Siswa</b>
                                </p>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('login.siswa.proses') }}" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <input type="text" name="username" class="form-control"
                                            placeholder="Username" required>
                                    </div>
                                    <div class="mb-3">
                                        <input type="password" name="password" class="form-control"
                                            placeholder="Password" required>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn bg-gradient-primary w-100 mt-3 mb-0">
                                            <i class="fas fa-sign-in-alt me-1"></i>
                                            Login
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </main>
    <script src="{{ asset('assets/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/core/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/argon-dashboard.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        @if (session('success'))

            Swal.fire({
                icon: "success",
                title: "Berhasil",
                text: "{{ session('success') }}"
            });
        @elseif (session('error'))

            Swal.fire({
                icon: "error",
                title: "Gagal!",
                text: "{{ session('error') }}"
            });
        @endif
    </script>

</body>

</html>
