<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ruangan;

class AdmRuanganController extends Controller
{
    public function index()
    {
        $ruangan = Ruangan::all(); // ambil semua ruangan
        return view('admin.data_ruangan', compact('ruangan'));
    }
}

