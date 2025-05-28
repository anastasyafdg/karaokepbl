<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard1Controller;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdmTransaksiController;
use App\Http\Controllers\AdmUlasanController;
use App\Http\Controllers\AdmDashboardController;
use App\Http\Controllers\PengunjungController;
use App\Http\Controllers\AdmRuanganController;
use App\Http\Controllers\AdmPaketController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\PembayaranSelesaiController;
use App\Http\Controllers\RuanganController;
use App\Http\Controllers\RiwayatController;
use App\Http\Controllers\PembayaranInformasiController;
use App\Http\Controllers\EditProfileController;
use App\Http\Controllers\RegistrasiController;
use App\Http\Controllers\UlasanController;
use App\Http\Controllers\GantiSandiController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\AdmPesanController;

Route::get('/', function () {
    return view('welcome');
    });

Route::get('/dashboard1', [Dashboard1Controller::class, 'index']);
Route::get('/landing', [LandingController::class, 'index']);
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::get('/registrasi', [registrasiController::class, 'index']);
Route::get('/data_transaksi', [AdmTransaksiController::class, 'index'])->name('transaksi');
Route::get('/data_ulasan', [AdmUlasanController::class, 'index'])->name('ulasan');
Route::get('/dashboard', [AdmDashboardController::class, 'index'])->name('admin_dashboard');
Route::get('/data_pengunjung', [PengunjungController::class, 'index'])->name('data_pengunjung');
Route::get('/data_ruangan', [AdmRuanganController::class, 'index'])->name('data_ruangan');
Route::get('/paket_admin', [AdmPaketController::class, 'index'])->name('paket_admin');
Route::get('/halaman_reservasi', [ReservationController::class, 'showReservationForm']);
Route::get('/konfirmasi_pembayaran', [PembayaranController::class, 'konfirmasi'])->name('pembayaran.konfirmasi');
Route::get('/pembayaran_selesai', [PembayaranSelesaiController::class, 'index']);
Route::get('/ruangan', [RuanganController::class, 'index']);
Route::get('/riwayat', [RiwayatController::class, 'index']);
Route::get('/pembayaran_informasi', [PembayaranInformasiController::class, 'index']);
Route::get('/edit_profile', [EditProfileController::class, 'index']);
Route::get('/ulasan', [UlasanController::class, 'index']);
Route::get('/ganti_sandi', [GantiSandiController::class, 'index']);
Route::get('/kontak', [KontakController::class, 'index']);
Route::get('/search', [VisitorController::class, 'search'])->name('search');
Route::get('/admin/pesan', [AdmPesanController::class, 'index'])->name('pesan');