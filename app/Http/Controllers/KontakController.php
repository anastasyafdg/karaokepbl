<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pesan;

class KontakController extends Controller
{
    public function index()
    {
        return view('users.kontak');
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'no' => 'required|string|max:20',
            'pesan' => 'required|string'
        ], [
            'nama.required' => 'Nama wajib diisi',
            'email.required' => 'Email wajib diisi',
            'email.email' => 'Format email tidak valid',
            'no.required' => 'Nomor telepon wajib diisi',
            'pesan.required' => 'Pesan wajib diisi'
        ]);

        try {
            // Simpan data ke database
            Pesan::create([
                'nama' => $request->nama,
                'email' => $request->email,
                'no' => $request->no,
                'pesan' => $request->pesan
            ]);

            // Redirect dengan pesan sukses
            return redirect()->back()->with('success', 'Pesan Anda berhasil dikirim! Terima kasih telah menghubungi kami.');
        } catch (\Exception $e) {
            // Redirect dengan pesan error
            return redirect()->back()->with('error', 'Terjadi kesalahan saat mengirim pesan. Silakan coba lagi.');
        }
    }
}