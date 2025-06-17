<?php
namespace App\Http\Controllers;

use App\Models\Reservasi;
use Illuminate\Http\Request;

class ReservasiController extends Controller
{
    public function index()
    {
        // Tidak perlu load relasi ruangan karena tidak ditampilkan
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
        ])->latest()->get();
        
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

}