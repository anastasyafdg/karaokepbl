<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pesan;

class AdmPesanController extends Controller
{
    // Menampilkan semua pesan ke view pesan.blade.php
   public function index()
{
    $pesan = Pesan::orderBy('created_at', 'desc')->get();
        
    return view('admin.pesan', compact('pesan'));
}
    public function destroy($id)
        {
            try {
                $pesan = pesan::findOrFail($id);
                
                $pesan->delete();
                
                return redirect()->route('pesan')->with('success', 'Pesan berhasil dihapus!');
                
            } catch (Exception $e) {
                \Log::error('Error deleting Pesan: ' . $e->getMessage());
                
                return redirect()->back()->with('error', 'Gagal menghapus data: ' . $e->getMessage());
            }
        }
    }

