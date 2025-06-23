<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pembayaran;
use App\Models\Reservasi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class KonfirmasiController extends Controller
{
    public function show($id)
    {
        $reservasi = Reservasi::with('ruangan')->findOrFail($id);
        
        $waktuMulai = \Carbon\Carbon::parse($reservasi->waktu_mulai);
        $waktuSelesai = \Carbon\Carbon::parse($reservasi->waktu_selesai);
        $durasi = max(1, $waktuMulai->diffInHours($waktuSelesai));
        $totalPembayaran = $durasi * $reservasi->ruangan->harga;

        return view('users.konfirmasi_pembayaran', [
            'reservasi' => $reservasi,
            'durasi' => $durasi,
            'totalPembayaran' => $totalPembayaran
        ]);
    }

    public function proses(Request $request)
    {
        $request->validate([
            'bukti_transfer' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'reservasi_id' => 'required|exists:reservasi,id'
        ]);

        $reservasi = Reservasi::findOrFail($request->reservasi_id);
        
        $waktuMulai = \Carbon\Carbon::parse($reservasi->waktu_mulai);
        $waktuSelesai = \Carbon\Carbon::parse($reservasi->waktu_selesai);
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
                'bukti_pembayaran' => 'images/' . $imageName, // Store relative path
                'status' => 'waiting_payment_confirmation'
            ]);

            $reservasi->update(['status' => 'Pending']);

            return redirect()->route('user.pembayaran_selesai', ['id' => $pembayaran->id])
                   ->with('status', 'Pembayaran berhasil dikonfirmasi!');
        }

        return redirect()->back()
               ->with('error', 'Gagal mengupload bukti transfer.');
    }
}