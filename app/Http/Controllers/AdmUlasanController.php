<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdmUlasanController extends Controller
{
    public function index()
    {
        // Tidak perlu mengirim data kalau isi view-nya statis
        return view('data_ulasan');
    }
}
