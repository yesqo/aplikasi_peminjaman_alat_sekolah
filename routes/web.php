    <?php

    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\LoginController;
    use App\Http\Controllers\DashboardController;
    use App\Http\Controllers\PetugasController;
    use App\Http\Controllers\SiswaController;
    use App\Http\Controllers\KategoriController;
    use App\Http\Controllers\AlatController;
    use App\Http\Controllers\PeminjamanController;
    use App\Http\Controllers\PengembalianController;
    use App\Http\Controllers\Siswa\PeminjamanController as SiswaPeminjamanController;
    use App\Http\Controllers\Siswa\PengembalianController as SiswaPengembalianController;

    use App\Http\Controllers\Siswa\LoginController as SiswaLoginController;
    use App\Http\Controllers\Siswa\DashboardController as SiswaDashboardController;
    use App\Http\Controllers\Siswa\AlatController as SiswaAlatController;
    use App\Http\Controllers\Siswa\RiwayatController as SiswaRiwayatController;

    // Halaman awal & login (tidak butuh login)
    Route::get('/', [LoginController::class, 'showLogin']);
    Route::get('/login', [LoginController::class, 'showLogin'])->name('login');
    Route::post('/actionLogin', [LoginController::class, 'actionLogin'])->name('actionLogin');
    Route::get('/logout', [LoginController::class, 'actionLogout'])->name('actionLogout');

    // Semua halaman di bawah ini WAJIB login sebagai Petugas
    Route::middleware('auth:petugas')->group(function () {

        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');


        // Petugas
        Route::get('/petugas', [PetugasController::class, 'index'])->name('petugas.index');
        Route::get('/petugas/tambah', [PetugasController::class, 'create'])->name('petugas.create');
        Route::post('/petugas/simpan', [PetugasController::class, 'store'])->name('petugas.store');
        Route::get('/petugas/edit/{id}', [PetugasController::class, 'edit'])->name('petugas.edit');
        Route::post('/petugas/update/{id}', [PetugasController::class, 'update'])->name('petugas.update');
        Route::get('/petugas/hapus/{id}', [PetugasController::class, 'destroy'])->name('petugas.destroy');

        // Siswa (dikelola oleh Petugas)
        Route::get('/siswa', [SiswaController::class, 'index'])->name('siswa.index');
        Route::get('/siswa/tambah', [SiswaController::class, 'create'])->name('siswa.create');
        Route::post('/siswa/simpan', [SiswaController::class, 'store'])->name('siswa.store');
        Route::get('/siswa/edit/{id}', [SiswaController::class, 'edit'])->name('siswa.edit');
        Route::post('/siswa/update/{id}', [SiswaController::class, 'update'])->name('siswa.update');
        Route::get('/siswa/hapus/{id}', [SiswaController::class, 'destroy'])->name('siswa.destroy');

        // Kategori
        Route::get('/kategori', [KategoriController::class, 'index'])->name('kategori.index');
        Route::get('/kategori/tambah', [KategoriController::class, 'create'])->name('kategori.create');
        Route::post('/kategori/simpan', [KategoriController::class, 'store'])->name('kategori.store');
        Route::get('/kategori/edit/{id}', [KategoriController::class, 'edit'])->name('kategori.edit');
        Route::post('/kategori/update/{id}', [KategoriController::class, 'update'])->name('kategori.update');
        Route::get('/kategori/hapus/{id}', [KategoriController::class, 'destroy'])->name('kategori.destroy');

        // Alat
        Route::get('/alat', [AlatController::class, 'index'])->name('alat.index');
        Route::get('/alat/tambah', [AlatController::class, 'create'])->name('alat.create');
        Route::post('/alat/simpan', [AlatController::class, 'store'])->name('alat.store');
        Route::get('/alat/edit/{id}', [AlatController::class, 'edit'])->name('alat.edit');
        Route::post('/alat/update/{id}', [AlatController::class, 'update'])->name('alat.update');
        Route::get('/alat/hapus/{id}', [AlatController::class, 'destroy'])->name('alat.destroy');

        // Peminjaman
        Route::get('/peminjaman', [PeminjamanController::class, 'index'])->name('peminjaman.index');
        Route::get('/peminjaman/tambah', [PeminjamanController::class, 'create'])->name('peminjaman.create');
        Route::post('/peminjaman/simpan', [PeminjamanController::class, 'store'])->name('peminjaman.store');

        // Pengembalian
        Route::get('/pengembalian', [PengembalianController::class, 'index'])->name('pengembalian.index');
        Route::get('/pengembalian/tambah', [PengembalianController::class, 'create'])->name('pengembalian.create');
        Route::post('/pengembalian/simpan', [PengembalianController::class, 'store'])->name('pengembalian.store');

        Route::get('/peminjaman/setujui/{id}', [PeminjamanController::class, 'approve'])->name('peminjaman.approve');
        Route::get('/peminjaman/tolak/{id}', [PeminjamanController::class, 'reject'])->name('peminjaman.reject');

        Route::get('/pengembalian/konfirmasi/{id}', [PengembalianController::class, 'confirm'])->name('pengembalian.confirm');
        Route::get('/pengembalian/tolak/{id}', [PengembalianController::class, 'reject'])->name('pengembalian.reject');

    });

    // Login Siswa (belum login)
    Route::get('/login-siswa', [SiswaLoginController::class, 'showLogin'])->name('login.siswa');
    Route::post('/login-siswa', [SiswaLoginController::class, 'actionLogin'])->name('login.siswa.proses');
    Route::get('/logout-siswa', [SiswaLoginController::class, 'actionLogout'])->name('logout.siswa');

    // Portal Siswa (wajib login sebagai siswa)
    Route::middleware('auth:siswa')->prefix('portal')->group(function () {
        Route::get('/dashboard', [SiswaDashboardController::class, 'index'])->name('portal.dashboard');
        Route::get('/alat', [SiswaAlatController::class, 'index'])->name('portal.alat');
        Route::get('/riwayat', [SiswaRiwayatController::class, 'index'])->name('portal.riwayat.index');
        Route::get('/riwayat/{id}', [SiswaRiwayatController::class, 'show'])->name('portal.riwayat.show');

        Route::get('/pinjam', [SiswaPeminjamanController::class, 'create'])->name('portal.peminjaman.create');
        Route::post('/pinjam', [SiswaPeminjamanController::class, 'store'])->name('portal.peminjaman.store');

        Route::get('/kembalikan', [SiswaPengembalianController::class, 'create'])->name('portal.pengembalian.create');
        Route::post('/kembalikan', [SiswaPengembalianController::class, 'store'])->name('portal.pengembalian.store');
    });
