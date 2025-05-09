<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PembayaranSelesaiController extends Controller
{
    public function index()
    {
        return view('users.pembayaran_selesai'); 
    }
}