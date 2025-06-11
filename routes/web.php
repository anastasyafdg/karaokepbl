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
use App\Http\Controllers\AdmTransaksiController;
use App\Http\Controllers\AdmUlasanController;
use App\Http\Controllers\AdmRuanganController;
use App\Http\Controllers\AdmPaketController;
use App\Http\Controllers\AdmPesanController;
use App\Http\Controllers\PengunjungController;

Route::get('/', fn () => view('welcome'));

// Umum / Publik
Route::get('/landing', [LandingController::class, 'index'])->name('landing');
Route::get('/dashboard1', [Dashboard1Controller::class, 'index']);

// Autentikasi
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/registrasi', [RegistrasiController::class, 'index'])->name('register');
Route::post('/registrasi', [RegistrasiController::class, 'register'])->name('register.submit');

// Pengunjung
Route::get('/ruangan', [RuanganController::class, 'index'])->name('ruangan.index');
Route::get('/ruangan/{id}', [RuanganController::class, 'show'])->name('ruangan.show');
Route::get('/halaman_reservasi', [ReservationController::class, 'showReservationForm']);
Route::get('/konfirmasi_pembayaran', [KonfirmasiController::class, 'konfirmasi'])->name('pembayaran.konfirmasi');
Route::post('/konfirmasi_pembayaran', [KonfirmasiController::class, 'konfirmasi'])->name('pembayaran.konfirmasi');
Route::get('/pembayaran_selesai', [PembayaranSelesaiController::class, 'index']);
Route::post('/pembayaran_selesai', [PembayaranSelesaiController::class, 'index']);
Route::get('/riwayat', [RiwayatController::class, 'index']);
Route::get('/edit_profile', [EditProfileController::class, 'index']);
Route::get('/ganti_sandi', [GantiSandiController::class, 'index'])->name('ganti_sandi');
Route::post('/ganti_sandi', [GantiSandiController::class, 'update'])->name('ganti_sandi.update');
Route::get('/kontak', [KontakController::class, 'index']);
Route::post('/kontak', [KontakController::class, 'store'])->name('kontak.store');
Route::get('/search', [VisitorController::class, 'search'])->name('search');

// Ulasan
Route::get('/ulasan', [UlasanController::class, 'index'])->name('ulasan');
Route::post('/ulasan', [UlasanController::class, 'store'])->name('ulasan.store');

// Admin - Dashboard & Data
Route::get('/dashboard', [AdmDashboardController::class, 'index'])->name('admin_dashboard');
Route::get('/data_pengunjung', [PengunjungController::class, 'index'])->name('data_pengunjung');

// Admin - Ruangan
Route::get('/data_ruangan', [AdmRuanganController::class, 'index'])->name('data_ruangan');
Route::get('/admin/data_ruangan', [AdmRuanganController::class, 'index'])->name('admin.data_ruangan');

// CRUD Ruangan (No Booking Routes)
Route::post('/data_ruangan/simpan', [AdmRuanganController::class, 'simpan'])->name('ruangan.simpan');
Route::post('/data_ruangan/update/{id}', [AdmRuanganController::class, 'update'])->name('ruangan.update');
Route::delete('/data_ruangan/hapus/{id}', [AdmRuanganController::class, 'destroy'])->name('ruangan.hapus');

// Admin - Transaksi
Route::get('/data_transaksi', [AdmTransaksiController::class, 'index'])->name('transaksi');

// Admin - Ulasan
Route::get('/ulasan-admin', [AdmUlasanController::class, 'index'])->name('admin.ulasan.index');
Route::post('/ulasan/{id}/approve', [AdmUlasanController::class, 'approve'])->name('admin.ulasan.approve');
Route::post('/ulasan/{id}/reject', [AdmUlasanController::class, 'reject'])->name('admin.ulasan.reject');

// Admin - Pesan
Route::get('/pesan', [AdmPesanController::class, 'index'])->name('pesan');
Route::delete('/pesan/hapus/{id}', [AdmPesanController::class, 'destroy'])->name('pesan.hapus');