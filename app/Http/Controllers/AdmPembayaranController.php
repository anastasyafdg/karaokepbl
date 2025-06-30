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
    public function index()
    {
        $pembayarans = Pembayaran::with('reservasi')->orderBy('created_at', 'desc')->get();
        
        return view('admin.data_pembayaran', [
            'pembayarans' => $pembayarans
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