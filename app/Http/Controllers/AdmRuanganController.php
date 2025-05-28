<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ruangan;

class AdmRuanganController extends Controller
{
    // Menampilkan semua data ruangan
    public function index()
    {
        $ruangan = Ruangan::all();
        return view('admin.data_ruangan', compact('ruangan'));
    }

    // Menyimpan data ruangan baru
   public function simpan(Request $request)
{
    // Validasi
    $request->validate([
        'id' => 'required|string|unique:ruangan,id',
        'jenis' => 'required',
        'paket' => 'required',
        'kapasitas' => 'required',
        'harga' => 'required|numeric',
        'fasilitas' => 'required',
        'gambar' => 'required|image|mimes:jpg,jpeg,png|max:2048'
    ]);

    // Upload file gambar
    $file = $request->file('gambar');
    $fileName = time() . '.' . $file->getClientOriginalExtension();
    $file->move(public_path('images'), $fileName);

    // Simpan ke database
    Ruangan::create([
        'id' => $request->id,
        'jenis' => $request->jenis,
        'paket' => $request->paket,
        'kapasitas' => $request->kapasitas,
        'harga' => $request->harga,
        'fasilitas' => $request->fasilitas,
        'gambar' => $fileName
    ]);

    return redirect()->route('admin.data_ruangan')->with('success', 'Data ruangan berhasil disimpan.');
    }
}
