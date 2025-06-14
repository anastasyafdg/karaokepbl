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

        $ruangan = Ruangan::findOrFail($request->ruangan_id);

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
            'total_harga' => $request->total_harga,
        ]);

        return redirect()->route('pembayaran.konfirmasi', [
            'Reservasi_id' => $reservation->id,
            'ruangan_id' => $ruangan->id,
            'tanggal' => $request->tanggal,
            'waktu_mulai' => $request->waktu_mulai,
            'waktu_selesai' => $request->waktu_selesai,
            'durasi' => $duration,
            'catatan' => $request->catatan ?? 'Tidak ada',
            'metode_pembayaran' => $request->metode_pembayaran,
            'total_harga' => $request->total_harga
        ]);
    }
    
}