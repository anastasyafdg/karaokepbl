<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PembayaranInformasiController extends Controller
{
    public function index()
    {
        return view('pembayaran_informasi'); 
    }
}
