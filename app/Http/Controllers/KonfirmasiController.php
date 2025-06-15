<?php

namespace App\Http\Controllers;

use App\Models\Reservasi; // Pastikan model Reservasi sudah ada
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

        // Menyimpan data pembayarannya ke database
        $reservasi = new Reservasi();
        $reservasi->kode_reservasi = 'SA001'; // Sesuaikan dengan logika pembuatan kode
        $reservasi->ruangan_id = 'B001'; // Sesuaikan dengan input
        $reservasi->tanggal = '2025-06-19'; // Sesuaikan dengan input
        $reservasi->waktu_mulai = '10:00'; // Sesuaikan dengan input
        $reservasi->waktu_selesai = '13:00'; // Sesuaikan dengan input
        $reservasi->durasi = 3; // Sesuaikan dengan durasi
        $reservasi->catatan = 'Test'; // Sesuaikan dengan catatan
        $reservasi->status = 'Tertunda'; // Status yang menunjukkan belum dikonfirmasi
        $reservasi->metode = $request->metode_pembayaran; // Simpan metode pembayaran
        $reservasi->bukti_transfer = $namaFile; // Menyimpan nama file bukti transfer
        $reservasi->user_id = auth()->id(); // Ambil ID user yang sedang login
        $reservasi->save();

        // Redirect ke halaman riwayat dengan membawa data pemesanan
        return redirect()->route('riwayat')->with('dataReservasi', $reservasi)->with('success', 'Pembayaran berhasil dikirim dan menunggu konfirmasi.');
    }

    // Menampilkan ringkasan pemesanan berdasarkan ID
    public function showConfirmation($id)
    {
        // Mengambil data reservasi berdasarkan ID
        $reservasi = Reservasi::findOrFail($id);

        // Menampilkan data reservasi di halaman konfirmasi pembayaran
        return view('users.konfirmasi_pembayaran', compact('reservasi'));
    }
}
