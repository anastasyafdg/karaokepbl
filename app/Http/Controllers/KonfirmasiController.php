<?php

namespace App\Http\Controllers;

use App\Models\Pemesanan; // Pastikan model Pemesanan sudah ada
use Illuminate\Http\Request;

class KonfirmasiController extends Controller
{
    // Tampilkan form konfirmasi pembayaran
    public function konfirmasi()
    {
        return view('users.konfirmasi_pembayaran');
    }

    // Proses pengiriman pembayaran (bukti transfer dan metode)
    public function prosesPembayaran(Request $request)
{
    // Validasi input dari form
    $request->validate([
        'metode_pembayaran' => 'required|string',
        'bukti_transfer' => 'required|image|mimes:jpeg,png,jpg|max:2048',
    ]);

    // Simpan file bukti transfer ke folder public/bukti_pembayaran
    $file = $request->file('bukti_transfer');
    $namaFile = time() . '_' . $file->getClientOriginalName();
    $file->move(public_path('bukti_pembayaran'), $namaFile);

    // Simpan data pemesanan yang belum dikonfirmasi
    $pemesanan = new Pemesanan();
    $pemesanan->kode_pemesanan = 'SA001'; // Sesuaikan dengan logika pembuatan kode
    $pemesanan->paket = 'Paket A'; // Sesuaikan dengan input
    $pemesanan->room_type = 'Small Room'; // Sesuaikan dengan input
    $pemesanan->tanggal = '18 April 2025'; // Sesuaikan dengan input
    $pemesanan->waktu = '13:00 - 16:00'; // Sesuaikan dengan input
    $pemesanan->total_harga = 150000; // Sesuaikan dengan input
    $pemesanan->status = 'Tertunda'; // Status yang menunjukkan belum dikonfirmasi oleh admin
    $pemesanan->bukti_transfer = $namaFile; // Menyimpan nama file bukti transfer
    $pemesanan->save();

    // Redirect ke halaman riwayat dengan membawa data pemesanan
    return redirect()->route('riwayat')->with('dataPemesanan', $pemesanan)->with('success', 'Pembayaran berhasil dikirim dan menunggu konfirmasi.');
}

}
