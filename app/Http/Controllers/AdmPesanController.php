<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pesan;

class AdmPesanController extends Controller
{
    // Menampilkan semua pesan ke view pesan.blade.php
   public function index()
{
    $pesan = pesan::all();
    return view('admin.pesan', compact('pesan'));
}

}
