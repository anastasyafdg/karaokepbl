<?php

namespace App\Http\Controllers;

use App\Models\Reservasi;
use Illuminate\Http\Request;

class ReservasiController extends Controller
{
    public function index()
    {
       $data = Reservasi::with('user')->select([
            'id',
            'user_id',
            'ruangan_id',
            'tanggal',
            'waktu_mulai',
            'waktu_selesai',
            'durasi',
            'catatan',
            'metode'
        ])->latest()->paginate(10); // tambahkan paginate

        
        return view('admin.data_reservasi', compact('data'));
    }

    public function destroy($id)
    {
        try {
            $reservasi = Reservasi::findOrFail($id);
            $reservasi->delete();

            return redirect()->route('data_reservasi')->with('success', 'Data reservasi berhasil dihapus!');
        } catch (\Exception $e) {
            return redirect()->route('data_reservasi')->with('error', 'Gagal menghapus data reservasi!');
        }
    }

    public function konfirmasiPembayaran($id)
    {
        $reservasi = Reservasi::with('ruangan')->findOrFail($id);

        $durasi = $reservasi->durasi; // Gunakan durasi langsung dari kolom
        $hargaPerJam = $reservasi->ruangan->harga_per_jam;
        $totalHarga = $hargaPerJam * $durasi;

        return view('users.konfirmasi_pembayaran', compact(
            'reservasi',
            'durasi',
            'hargaPerJam',
            'totalHarga'
        ));
    }
}
