<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PengunjungController extends Controller
{
    public function index()
    {
        return view('data_pengunjung');
    }
}
