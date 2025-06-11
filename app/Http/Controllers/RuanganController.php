<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ruangan;

class RuanganController extends Controller
{
    public function index()
    {
        $ruangans = Ruangan::all();
        return view('users.ruangan', compact('ruangans'));
    }
    public function show($id)
    {
        $ruangan = Ruangan::findOrFail($id);
        return response()->json($ruangan);
    }
}