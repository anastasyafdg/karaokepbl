<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
    {
        return view('users.landing');
    }

    public function redirectToRuangan($size)
    {
        $validSizes = ['kecil', 'sedang', 'besar'];
        if (!in_array($size, $validSizes)) {
            abort(404);
        }
        return redirect()->route('ruangan.index', ['triggerFilter' => $size]);
    }

    public function redirectToRuanganSearch($paket)
    {
        $validPakets = ['A', 'B', 'C'];
        if (!in_array($paket, $validPakets)) {
            abort(404);
        }
        return redirect()->route('ruangan.index', ['search' => 'Paket '.$paket]);
    }
}