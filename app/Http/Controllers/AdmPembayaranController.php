<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Pembayaran;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Exception;

class AdmPembayaranController extends Controller
{
    public function index()
    {
        $pembayarans = Pembayaran::orderBy('created_at', 'desc')->get();
        
        return view('admin.data_pembayaran', [
            'pembayarans' => $pembayarans
        ]);
    }

    public function updateStatus(Request $request, $id)
    {
        try {
            $request->validate([
                'status' => 'required|in:Menunggu,Terkonfirmasi,Batal'
            ]);

            $pembayaran = Pembayaran::findOrFail($id);
            $pembayaran->status = $request->status;
            $pembayaran->save();

            return redirect()->route('data_pembayaran')->with('success', 'Status pembayaran berhasil diupdate!');
        } catch (Exception $e) {
            return redirect()->route('data_pembayaran')->with('error', 'Gagal mengupdate status pembayaran!');
        }
    }

    public function destroy($id)
    {
        try {
            $pembayaran = Pembayaran::findOrFail($id);
            
            // Delete associated file if exists
            if ($pembayaran->bukti_pembayaran && Storage::disk('public')->exists('image/' . $pembayaran->bukti_pembayaran)) {
                Storage::disk('public')->delete('image/' . $pembayaran->bukti_pembayaran);
            }
            
            $pembayaran->delete();

            return redirect()->route('data_pembayaran')->with('success', 'Data pembayaran berhasil dihapus!');
        } catch (Exception $e) {
            return redirect()->route('data_pembayaran')->with('error', 'Gagal menghapus data pembayaran!');
        }
    }
}