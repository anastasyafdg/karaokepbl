<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pembayaran;
use App\Models\Reservasi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class KonfirmasiController extends Controller
{
    public function show($id)
    {
        $reservasi = Reservasi::with('ruangan')->findOrFail($id);
        
        // Check if payment time has expired (30 minutes)
        $createdAt = Carbon::parse($reservasi->created_at);
        $expiryTime = $createdAt->addMinutes(30);
        
        if (Carbon::now()->gt($expiryTime) && $reservasi->status !== 'Pending') {
            $this->handlePaymentTimeout($reservasi);
            return redirect()->route('landing')->with('error', 'Waktu pembayaran telah habis. Reservasi dibatalkan.');
        }

        $waktuMulai = Carbon::parse($reservasi->waktu_mulai);
        $waktuSelesai = Carbon::parse($reservasi->waktu_selesai);
        $durasi = max(1, $waktuMulai->diffInHours($waktuSelesai));
        $totalPembayaran = $durasi * $reservasi->ruangan->harga;

        // Calculate remaining time in seconds for the frontend timer
        $remainingTime = Carbon::now()->diffInSeconds($expiryTime, false);
        $remainingTime = $remainingTime > 0 ? $remainingTime : 0;

        return view('users.konfirmasi_pembayaran', [
            'reservasi' => $reservasi,
            'durasi' => $durasi,
            'totalPembayaran' => $totalPembayaran,
            'remainingTime' => $remainingTime // Pass remaining time to view
        ]);
    }

    public function proses(Request $request)
    {
        $request->validate([
            'bukti_transfer' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'reservasi_id' => 'required|exists:reservasi,id'
        ]);

        $reservasi = Reservasi::findOrFail($request->reservasi_id);
        
        // Check if payment time has expired (30 minutes)
        $createdAt = Carbon::parse($reservasi->created_at);
        $expiryTime = $createdAt->addSeconds(1800);
        
        if (Carbon::now()->gt($expiryTime)) {
            $this->handlePaymentTimeout($reservasi);
            return redirect()->route('landing')->with('error', 'Waktu pembayaran telah habis. Reservasi dibatalkan.');
        }

        $waktuMulai = Carbon::parse($reservasi->waktu_mulai);
        $waktuSelesai = Carbon::parse($reservasi->waktu_selesai);
        $durasi = max(1, $waktuMulai->diffInHours($waktuSelesai));
        $totalPembayaran = $durasi * $reservasi->ruangan->harga;

        if ($request->hasFile('bukti_transfer')) {
            $image = $request->file('bukti_transfer');
            $extension = $image->getClientOriginalExtension();
            $imageName = 'reservasi_' . $reservasi->id . '_' . time() . '.' . $extension;
            
            // Store the image in public/images directory
            $path = $image->move(public_path('images'), $imageName);
            
            $pembayaran = Pembayaran::create([
                'reservasi_id' => $reservasi->id,
                'user_id' => Auth::id(),
                'total_biaya' => $totalPembayaran,
                'bukti_pembayaran' => 'images/' . $imageName,
                'status' => 'waiting_payment_confirmation'
            ]);

            $reservasi->update(['status' => 'Pending']);

            return redirect()->route('user.pembayaran_selesai', ['id' => $pembayaran->id])
                   ->with('status', 'Pembayaran berhasil dikonfirmasi!');
        }

        return redirect()->back()
               ->with('error', 'Gagal mengupload bukti transfer.');
    }

    protected function handlePaymentTimeout(Reservasi $reservasi)
    {
        $waktuMulai = Carbon::parse($reservasi->waktu_mulai);
        $waktuSelesai = Carbon::parse($reservasi->waktu_selesai);
        $durasi = max(1, $waktuMulai->diffInHours($waktuSelesai));
        $totalPembayaran = $durasi * $reservasi->ruangan->harga;

        Pembayaran::create([
            'reservasi_id' => $reservasi->id,
            'user_id' => $reservasi->user_id,
            'total_biaya' => $totalPembayaran,
            'bukti_pembayaran' => null,
            'status' => 'Batal',
            'keterangan' => 'Pembayaran dibatalkan karena melebihi batas waktu'
        ]);

        $reservasi->update(['status' => 'Batal']);
    }

    public function handleTimeout($id)
    {
        $reservasi = Reservasi::findOrFail($id);
        $this->handlePaymentTimeout($reservasi);
        
        return response()->json(['success' => true]);
    }
}