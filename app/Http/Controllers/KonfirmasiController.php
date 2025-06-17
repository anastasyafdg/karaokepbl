<?php

namespace App\Http\Controllers;

use App\Models\Reservasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KonfirmasiController extends Controller
{
    public function showConfirmation($id)
    {
        $reservasi = Reservasi::with('ruangan')->findOrFail($id);

        $hargaPerJam = $reservasi->ruangan->harga_per_jam;

        // Gunakan hitungan durasi berdasarkan jam_mulai (bisa array JSON)
        $jamMulai = json_decode($reservasi->jam_mulai, true);
        $durasi = is_array($jamMulai) ? count($jamMulai) : 1;

        // Hitung total harga
        $totalHarga = $hargaPerJam * $durasi;

        // Update total biaya di database jika belum ada atau 0
        if (!$reservasi->total_pembayaran || $reservasi->total_pembayaran == 0) {
            $reservasi->update(['total_pembayaran' => $totalHarga]);
        }

        return view('users.konfirmasi_pembayaran', [
            'reservasi' => $reservasi,
            'durasi' => $durasi,
            'hargaPerJam' => $hargaPerJam,
            'totalPembayaran' => $reservasi->total_pembayaran ?? $totalHarga // Pastikan menggunakan total_pembayaran
        ]);
    }

   public function prosesPembayaran(Request $request)
{
    $request->validate([
        'reservasi_id' => 'required|exists:reservasi,id',
        'bukti_transfer' => 'required|image|mimes:jpeg,png,jpg|max:2048',
    ]);

    $reservasi = Reservasi::findOrFail($request->reservasi_id);

    // Pastikan hargaPerJam adalah angka dan durasi valid
    $hargaPerJam = is_numeric($reservasi->ruangan->harga_per_jam) ? (float)$reservasi->ruangan->harga_per_jam : 0.0;
    $durasi = is_numeric($reservasi->durasi) ? (float)$reservasi->durasi : 1.0;

    // Hitung total pembayaran
    $totalPembayaran = $hargaPerJam * $durasi;

    // Pastikan totalPembayaran bernilai valid
    if ($totalPembayaran <= 0) {
        // Handle error jika totalPembayaran tidak valid
        return back()->withErrors('Total pembayaran tidak valid.');
    }

    // Upload bukti transfer
    $path = $request->file('bukti_transfer')->store('public/bukti_pembayaran');
    $publicPath = str_replace('public/', 'storage/', $path);

    // Update Reservasi
    $reservasi->update([
        'metode' => 'Bank Transfer',
        'bukti_transfer' => $publicPath,
        'status' => 'Tertunda',
        'total_pembayaran' => $totalPembayaran
    ]);

    // Membuat entri pembayaran baru
    Pembayaran::create([
        'reservasi_id' => $reservasi->id,
        'total_biaya' => $totalPembayaran,
        'tanggal_pembayaran' => now(),
        'bukti_pembayaran' => $publicPath,
        'status' => 'Tertunda', // Ganti sesuai status pembayaran
    ]);

    return redirect('/pembayaran_selesai')->with([
        'dataReservasi' => $reservasi,
        'success' => 'Pembayaran berhasil dikonfirmasi!'
    ]);
}



}
