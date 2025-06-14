<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservasi;
use App\Models\Ruangan;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    public function showReservationForm($id)
    {
        $ruangan = Ruangan::findOrFail($id);
        return view('users.halaman_reservasi', compact('ruangan'));
    }

    // app/Http/Controllers/ReservationController.php
    public function storeReservation(Request $request)
    {
        $request->validate([
            'ruangan_id' => 'required|exists:ruangan,id',
            'tanggal' => 'required|date',
            'waktu_mulai' => 'required',
            'waktu_selesai' => 'required',
            'catatan' => 'nullable|string',
            'metode_pembayaran' => 'required|in:transfer,e-wallet',
            'total_harga' => 'required|numeric',
        ]);
    
        // Calculate duration
        $start = strtotime($request->waktu_mulai);
        $end = strtotime($request->waktu_selesai);
        $duration = ($end - $start) / 3600;
    
        // Create reservation
        $reservation = Reservasi::create([
            'ruangan_id' => $request->ruangan_id,
            'tanggal' => $request->tanggal,
            'waktu_mulai' => $request->waktu_mulai,
            'waktu_selesai' => $request->waktu_selesai,
            'durasi' => $duration,
            'catatan' => $request->catatan,
            'metode' => $request->metode_pembayaran === 'transfer' ? 'bank_transfer' : 'e_wallet',
        ]);
    
        return redirect()->route('pembayaran.konfirmasi')->with('success', 'Reservasi berhasil dibuat!');
    }
}