<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard1Controller;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdmTransaksiController;
use App\Http\Controllers\AdmUlasanController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard1', [Dashboard1Controller::class, 'index']);
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::get('/data_transaksi', [AdmTransaksiController::class, 'index'])->name('transaksi');
Route::get('/data_ulasan', [AdmUlasanController::class, 'index'])->name('ulasan');