<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pembayaran; // Add this import

class PembayaranSelesaiController extends Controller
{
    public function index()
    {
        return view('users.pembayaran_selesai'); 
    }
    
    public function selesai($id)
    {
        $pembayaran = Pembayaran::with(['reservasi', 'user'])->findOrFail($id);
        return view('users.pembayaran_selesai', compact('pembayaran'));
    }
}