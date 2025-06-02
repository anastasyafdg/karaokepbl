<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class GantiSandiController extends Controller
{
    public function index()
    {
        return view('auth.ganti_sandi');
    }

    public function update(Request $request)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:user,email', // cek email harus sudah ada
            'password' => 'required|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        // Cari user berdasarkan email
        $user = User::where('email', $request->email)->first();

        // Update password
        $user->password = Hash::make($request->password);
        $user->save();

        // Redirect ke halaman login dengan flash message sukses
        return redirect()->route('login')->with('success', 'Password berhasil diubah, silakan login dengan password baru.');
    }
}
