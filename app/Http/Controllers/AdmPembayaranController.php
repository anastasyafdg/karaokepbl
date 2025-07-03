<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Pembayaran;
use App\Models\Reservasi;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Exception;

class AdmPembayaranController extends Controller
{
    public function index(Request $request)
    {    
        // Query dasar dengan relasi ke reservasi & user
        $query = Pembayaran::with(['reservasi', 'user']);

        // Filter: Status
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // Filter: Rentang Tanggal
        if ($request->filled('tanggal_mulai') && $request->filled('tanggal_akhir')) {
            $query->whereBetween('created_at', [
                $request->tanggal_mulai . ' 00:00:00',
                $request->tanggal_akhir . ' 23:59:59'
            ]);
        }

        // Ambil data dan urutkan terbaru
        $pembayarans = $query->orderBy('created_at', 'desc')->paginate(10);

        // Kirim data dan request untuk menampilkan kembali input filter di blade
        return view('admin.data_pembayaran', [
            'pembayarans' => $pembayarans,
            'request' => $request
        ]);
    }


    public function updateStatus(Request $request, $id)
    {
        try {
            $request->validate([
                'status' => 'required|in:Terkonfirmasi,Pending,Batal'
            ]);

            $pembayaran = Pembayaran::findOrFail($id);
            $pembayaran->status = $request->status;
            $pembayaran->save();

            // Update reservasi jika status Terkonfirmasi
            if ($request->status == 'Terkonfirmasi') {
                Reservasi::where('id', $pembayaran->reservasi_id)
                    ->update(['status' => 'Selesai']); 
            }

            return redirect()->route('data_pembayaran')->with('success', 'Status pembayaran berhasil diupdate!');
        } catch (Exception $e) {
            return redirect()->route('data_pembayaran')->with('error', 'Gagal mengupdate status pembayaran! Pesan: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $pembayaran = Pembayaran::findOrFail($id);
            
            // Delete associated file if exists
            if ($pembayaran->bukti_pembayaran) {
                $filePath = public_path($pembayaran->bukti_pembayaran);
                if (file_exists($filePath)) {
                    unlink($filePath);
                }
            }
            
            $pembayaran->delete();

            return redirect()->route('data_pembayaran')->with('success', 'Data pembayaran berhasil dihapus!');
        } catch (Exception $e) {
            return redirect()->route('data_pembayaran')->with('error', 'Gagal menghapus data pembayaran!');
        }
    }
}