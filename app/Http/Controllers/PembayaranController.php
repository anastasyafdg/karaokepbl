<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    public function konfirmasi()
    {
        return view('users.konfirmasi_pembayaran');
    }
}
