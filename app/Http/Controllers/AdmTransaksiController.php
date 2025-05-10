<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdmTransaksiController extends Controller
{
    public function index()
    {
        return view('admin.data_transaksi');
    }
}
