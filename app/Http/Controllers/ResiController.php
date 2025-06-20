<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pembayaran;
use App\Models\Reservasi;

class ResiController extends Controller
{
    public function show($id)
    {
        try {
            // Ambil pembayaran berdasarkan ID dengan relasi
            $pembayaran = Pembayaran::with([
                'reservasi.ruangan', 
                'reservasi.user',
                'user'
            ])->findOrFail($id);

            // Debug: tampilkan info pembayaran
            \Log::info('Pembayaran found:', [
                'id' => $pembayaran->id,
                'status' => $pembayaran->status,
                'reservasi_id' => $pembayaran->reservasi_id
            ]);

            // Cek status konfirmasi admin - tambahkan berbagai kemungkinan status
            $allowedStatuses = ['Confirmed', 'Completed', 'terkonfirmasi', 'confirmed', 'completed'];
            if (!in_array($pembayaran->status, $allowedStatuses)) {
                return redirect()->back()->with('error', 'Resi belum tersedia, tunggu konfirmasi admin. Status saat ini: ' . $pembayaran->status);
            }

            return view('resi.show', compact('pembayaran'));
            
        } catch (\Exception $e) {
            \Log::error('Error in ResiController: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}