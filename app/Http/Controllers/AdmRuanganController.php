<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdmRuanganController extends Controller
{
    public function index()
    {
        return view('data_ruangan');
    }
}
