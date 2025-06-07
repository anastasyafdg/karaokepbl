<?php

namespace App\Http\Controllers;

use App\Models\transaksi;
use Illuminate\Http\Request;

class AdmTransaksiController extends Controller
{
    public function index()
    {
        $transaksi = transaksi::all(); // Use the correct model name
        return view('admin.data_transaksi', compact('transaksi'));
    }

    public function update(Request $request, $id)
    {
        $transaksi = Transaksi::find($id); // Use the primary key directly
        
        if (!$transaksi) {
            return redirect()->back()->with('error', 'Data tidak ditemukan.');
        }
    
        $validatedData = $request->validate([
            'nama_pengunjung' => 'required',
            'paket_ruangan' => 'required',
            'jenis_ruangan' => 'required',
            'tanggal_waktu' => 'required|date',
            'status' => 'required'
        ]);
    
        $transaksi->update($validatedData);
    
        return redirect()->route('transactions.index')->with('success', 'Transaksi berhasil diperbarui.');
    }
    

    public function destroy($id)
    {
        $transaksi = transaksi::findOrFail($id);
        $transaksi->delete();
        
        return redirect()->route('transaksi.index')
            ->with('success', 'Transaksi berhasil dihapus');
    }
}