<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdmTransaksiController extends Controller
{
    public function index()
    {
        return view('data_transaksi');
    }
}
