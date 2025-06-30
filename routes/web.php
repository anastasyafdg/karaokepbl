<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard1Controller;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegistrasiController;
use App\Http\Controllers\GantiSandiController;
use App\Http\Controllers\EditProfileController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\VisitorController;
use App\Http\Controllers\RuanganController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\KonfirmasiController;
use App\Http\Controllers\PembayaranSelesaiController;
use App\Http\Controllers\RiwayatController;
use App\Http\Controllers\ResiController;
use App\Http\Controllers\UlasanController;

// Admin Controllers
use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\AdmDashboardController;
use App\Http\Controllers\ReservasiController;
use App\Http\Controllers\AdmPembayaranController;
use App\Http\Controllers\AdmUlasanController;
use App\Http\Controllers\AdmRuanganController;
use App\Http\Controllers\AdmPesanController;
use App\Http\Controllers\PengunjungController;

Route::get('/', fn () => view('welcome'));

// Umum / Publik
Route::get('/dashboard1', [Dashboard1Controller::class, 'index']);

// Autentikasi
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/ganti_sandi', [GantiSandiController::class, 'index'])->name('ganti_sandi');
Route::post('/ganti_sandi', [GantiSandiController::class, 'update'])->name('ganti_sandi.update');
Route::get('/registrasi', [RegistrasiController::class, 'index'])->name('register');
Route::post('/registrasi', [RegistrasiController::class, 'register'])->name('register.submit');

// =================== ROUTE PENGUNJUNG ===================
Route::get('/landing', [LandingController::class, 'index'])
    ->middleware(['auth:web', 'checkrole:pengunjung'])->name('landing');

Route::get('/ruangan', [RuanganController::class, 'index'])
    ->middleware(['auth:web', 'checkrole:pengunjung'])->name('ruangan.index');

Route::get('/ruangan/{id}', [RuanganController::class, 'show'])
    ->middleware(['auth:web', 'checkrole:pengunjung'])->name('ruangan.show');

Route::get('/ruangan/filter/{size}', [LandingController::class, 'redirectToRuangan'])
    ->middleware(['auth:web', 'checkrole:pengunjung'])->name('landing.filter');

Route::get('/ruangan/search/{paket}', [LandingController::class, 'redirectToRuanganSearch'])
    ->middleware(['auth:web', 'checkrole:pengunjung'])->name('landing.search');

Route::get('/halaman_reservasi/{id}', [ReservationController::class, 'showForm'])
    ->middleware(['auth:web', 'checkrole:pengunjung'])->name('reservasi.form');

Route::post('/simpan-reservasi', [ReservationController::class, 'store'])
    ->middleware(['auth:web', 'checkrole:pengunjung'])->name('reservasi.store');

Route::get('/riwayat', [RiwayatController::class, 'index'])
    ->middleware(['auth:web', 'checkrole:pengunjung']);

Route::get('/resi/{id}', [ResiController::class, 'show'])
    ->middleware(['auth:web', 'checkrole:pengunjung'])->name('resi.show');

Route::get('/edit_profile', [EditProfileController::class, 'edit'])
    ->middleware(['auth:web', 'checkrole:pengunjung'])->name('profile.edit');

Route::post('/edit_profile', [EditProfileController::class, 'update'])
    ->middleware(['auth:web', 'checkrole:pengunjung'])->name('profile.update');

Route::post('/update_password', [EditProfileController::class, 'updatePassword'])
    ->middleware(['auth:web', 'checkrole:pengunjung'])->name('profile.updatePassword');

Route::get('/kontak', [KontakController::class, 'index'])
    ->middleware(['auth:web', 'checkrole:pengunjung'])->name('kontak');

Route::post('/kontak', [KontakController::class, 'store'])
    ->middleware(['auth:web', 'checkrole:pengunjung'])->name('kontak.store');

Route::get('/search', [VisitorController::class, 'search'])
    ->middleware(['auth:web', 'checkrole:pengunjung'])->name('search');

Route::get('/ulasan', [UlasanController::class, 'index'])
    ->middleware(['auth:web', 'checkrole:pengunjung'])->name('ulasan');

Route::post('/ulasan', [UlasanController::class, 'store'])
    ->middleware(['auth:web', 'checkrole:pengunjung'])->name('ulasan.store');

Route::get('/konfirmasi-pembayaran/{id}', [KonfirmasiController::class, 'show'])
     ->name('users.konfirmasi_pembayaran')
     ->middleware('auth:web');

Route::post('/konfirmasi-pembayaran/proses', [KonfirmasiController::class, 'proses'])
     ->name('konfirmasi.proses')
     ->middleware('auth:web');

Route::get('/pembayaran-selesai/{id}', [PembayaranSelesaiController::class, 'selesai'])
    ->name('user.pembayaran_selesai')
    ->middleware('auth:web');

// =================== ROUTE ADMIN ===================
Route::get('/dashboard', [AdmDashboardController::class, 'index'])
    ->middleware(['auth:admin', 'checkrole:admin'])->name('admin_dashboard');

Route::get('/data_pengunjung', [PengunjungController::class, 'index'])
    ->middleware(['auth:admin', 'checkrole:admin'])->name('data_pengunjung');

Route::get('/data_ruangan', [AdmRuanganController::class, 'index'])
    ->middleware(['auth:admin', 'checkrole:admin'])->name('data_ruangan');

Route::get('/admin/data_ruangan', [AdmRuanganController::class, 'index'])
    ->middleware(['auth:admin', 'checkrole:admin'])->name('admin.data_ruangan');

Route::post('/data_ruangan/simpan', [AdmRuanganController::class, 'simpan'])
    ->middleware(['auth:admin', 'checkrole:admin'])->name('ruangan.simpan');

Route::post('/data_ruangan/update/{id}', [AdmRuanganController::class, 'update'])
    ->middleware(['auth:admin', 'checkrole:admin'])->name('ruangan.update');

Route::delete('/data_ruangan/hapus/{id}', [AdmRuanganController::class, 'destroy'])
    ->middleware(['auth:admin', 'checkrole:admin'])->name('ruangan.hapus');

Route::get('/data_reservasi', [ReservasiController::class, 'index'])
    ->middleware(['auth:admin', 'checkrole:admin'])->name('data_reservasi');

Route::delete('/data_reservasi/{id}', [ReservasiController::class, 'destroy'])
    ->middleware(['auth:admin', 'checkrole:admin'])->name('data_reservasi.destroy');

Route::get('/data_pembayaran', [AdmPembayaranController::class, 'index'])
    ->middleware(['auth:admin', 'checkrole:admin'])->name('data_pembayaran');

Route::post('/data_pembayaran/{id}/update-status', [AdmPembayaranController::class, 'updateStatus'])
    ->middleware(['auth:admin', 'checkrole:admin'])->name('data_pembayaran.update-status');

Route::delete('/data_pembayaran/{id}', [AdmPembayaranController::class, 'destroy'])
    ->middleware(['auth:admin', 'checkrole:admin'])->name('data_pembayaran.destroy');

Route::get('/ulasan-admin', [AdmUlasanController::class, 'index'])
    ->middleware(['auth:admin', 'checkrole:admin'])->name('admin.ulasan.index');

Route::post('/ulasan/{id}/approve', [AdmUlasanController::class, 'approve'])
    ->middleware(['auth:admin', 'checkrole:admin'])->name('admin.ulasan.approve');

Route::post('/ulasan/{id}/reject', [AdmUlasanController::class, 'reject'])
    ->middleware(['auth:admin', 'checkrole:admin'])->name('admin.ulasan.reject');

Route::get('/pesan', [AdmPesanController::class, 'index'])
    ->middleware(['auth:admin', 'checkrole:admin'])->name('pesan');

Route::delete('/pesan/hapus/{id}', [AdmPesanController::class, 'destroy'])
    ->middleware(['auth:admin', 'checkrole:admin'])->name('pesan.hapus');
