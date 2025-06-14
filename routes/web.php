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
use App\Http\Controllers\UlasanController;

// Admin Controllers
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

// Pengunjung
Route::get('/landing', [LandingController::class, 'index'])
    ->middleware(['auth', 'checkrole:pengunjung'])->name('landing');

Route::get('/ruangan', [RuanganController::class, 'index'])
    ->middleware(['auth', 'checkrole:pengunjung'])->name('ruangan.index');

Route::get('/ruangan/{id}', [RuanganController::class, 'show'])
    ->middleware(['auth', 'checkrole:pengunjung'])->name('ruangan.show');

Route::get('/halaman_reservasi', [ReservationController::class, 'showReservationForm'])
    ->middleware(['auth', 'checkrole:pengunjung']);

Route::get('/halaman_reservasi/{id}', [ReservationController::class, 'showReservationForm'])
    ->middleware(['auth', 'checkrole:pengunjung'])->name('reservasi.form');

Route::post('/simpan-reservasi', [ReservationController::class, 'storeReservation'])
    ->middleware(['auth', 'checkrole:pengunjung'])->name('reservasi.store');
    
Route::get('/konfirmasi_pembayaran', [KonfirmasiController::class, 'konfirmasi'])
    ->middleware(['auth', 'checkrole:pengunjung'])->name('pembayaran.konfirmasi');

Route::post('/konfirmasi_pembayaran', [KonfirmasiController::class, 'konfirmasi'])
    ->middleware(['auth', 'checkrole:pengunjung']);

Route::get('/pembayaran_selesai', [PembayaranSelesaiController::class, 'index'])
    ->middleware(['auth', 'checkrole:pengunjung']);

Route::post('/pembayaran_selesai', [PembayaranSelesaiController::class, 'index'])
    ->middleware(['auth', 'checkrole:pengunjung']);

Route::get('/riwayat', [RiwayatController::class, 'index'])
    ->middleware(['auth', 'checkrole:pengunjung']);

Route::get('/edit_profile', [EditProfileController::class, 'index'])
    ->middleware(['auth', 'checkrole:pengunjung']);

Route::get('/kontak', [KontakController::class, 'index'])
    ->middleware(['auth', 'checkrole:pengunjung']);

Route::post('/kontak', [KontakController::class, 'store'])
    ->middleware(['auth', 'checkrole:pengunjung'])->name('kontak.store');

Route::get('/search', [VisitorController::class, 'search'])
    ->middleware(['auth', 'checkrole:pengunjung'])->name('search');

// Ulasan
Route::get('/ulasan', [UlasanController::class, 'index'])
    ->middleware(['auth', 'checkrole:pengunjung'])->name('ulasan');

Route::post('/ulasan', [UlasanController::class, 'store'])
    ->middleware(['auth', 'checkrole:pengunjung'])->name('ulasan.store');

// Dashboard Admin
Route::get('/dashboard', [AdmDashboardController::class, 'index'])
    ->middleware(['auth', 'checkrole:admin'])->name('admin_dashboard');

// Data Pengunjung
Route::get('/data_pengunjung', [PengunjungController::class, 'index'])
    ->middleware(['auth', 'checkrole:admin'])->name('data_pengunjung');

// Data Ruangan
Route::get('/data_ruangan', [AdmRuanganController::class, 'index'])
    ->middleware(['auth', 'checkrole:admin'])->name('data_ruangan');

Route::get('/admin/data_ruangan', [AdmRuanganController::class, 'index'])
    ->middleware(['auth', 'checkrole:admin'])->name('admin.data_ruangan');

// CRUD Ruangan (No Booking Routes)
Route::post('/data_ruangan/simpan', [AdmRuanganController::class, 'simpan'])
    ->middleware(['auth', 'checkrole:admin'])->name('ruangan.simpan');

Route::post('/data_ruangan/update/{id}', [AdmRuanganController::class, 'update'])
    ->middleware(['auth', 'checkrole:admin'])->name('ruangan.update');

Route::delete('/data_ruangan/hapus/{id}', [AdmRuanganController::class, 'destroy'])
    ->middleware(['auth', 'checkrole:admin'])->name('ruangan.hapus');

// Data Reservasi
Route::get('/data_reservasi', [ReservasiController::class, 'index'])
    ->middleware(['auth', 'checkrole:admin'])->name('data_reservasi');

Route::delete('/data_reservasi/{id}', [ReservasiController::class, 'destroy'])
    ->middleware(['auth', 'checkrole:admin'])->name('data_reservasi.destroy');

// Data Pembayaran
Route::get('/data_pembayaran', [AdmPembayaranController::class, 'index'])
    ->middleware(['auth', 'checkrole:admin'])->name('data_pembayaran');

Route::post('/data_pembayaran/{id}/update-status', [AdmPembayaranController::class, 'updateStatus'])
    ->middleware(['auth', 'checkrole:admin'])->name('data_pembayaran.update-status');

Route::delete('/data_pembayaran/{id}', [AdmPembayaranController::class, 'destroy'])
    ->middleware(['auth', 'checkrole:admin'])->name('data_pembayaran.destroy');

// Data Ulasan
Route::get('/ulasan-admin', [AdmUlasanController::class, 'index'])
    ->middleware(['auth', 'checkrole:admin'])->name('admin.ulasan.index');

Route::post('/ulasan/{id}/approve', [AdmUlasanController::class, 'approve'])
    ->middleware(['auth', 'checkrole:admin'])->name('admin.ulasan.approve');

Route::post('/ulasan/{id}/reject', [AdmUlasanController::class, 'reject'])
    ->middleware(['auth', 'checkrole:admin'])->name('admin.ulasan.reject');

// Data Pesan
Route::get('/pesan', [AdmPesanController::class, 'index'])
    ->middleware(['auth', 'checkrole:admin'])->name('pesan');

Route::delete('/pesan/hapus/{id}', [AdmPesanController::class, 'destroy'])
    ->middleware(['auth', 'checkrole:admin'])->name('pesan.hapus');

    
