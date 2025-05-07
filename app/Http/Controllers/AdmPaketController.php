<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdmPaketController extends Controller
{
    public function index()
    {
        return view('paket_admin');
    }
}
