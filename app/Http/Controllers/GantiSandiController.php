<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GantiSandiController extends Controller
{
    public function index()
    {
        return view('auth.ganti_sandi');
    }
}
