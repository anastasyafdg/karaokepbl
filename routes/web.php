<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard1Controller;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdmTransaksiController;
use App\Http\Controllers\AdmUlasanController;
use App\Http\Controllers\AdmDashboardController;
use App\Http\Controllers\PengunjungController;
use App\Http\Controllers\AdmRuanganController;
use App\Http\Controllers\AdmPaketController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard1', [Dashboard1Controller::class, 'index']);
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::get('/data_transaksi', [AdmTransaksiController::class, 'index'])->name('transaksi');
Route::get('/data_ulasan', [AdmUlasanController::class, 'index'])->name('ulasan');
Route::get('/admin_dashboard', [AdmDashboardController::class, 'index'])->name('admin_dashboard');
Route::get('/data_pengunjung', [PengunjungController::class, 'index'])->name('data_pengunjung');
Route::get('/data_ruangan', [AdmRuanganController::class, 'index'])->name('data_ruangan');
Route::get('/paket_admin', [AdmPaketController::class, 'index'])->name('paket_admin');