<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class LoginController extends Controller
{
    /**
     * Menampilkan form login.
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }

    /**
     * Menangani proses login dengan validasi khusus.
     */
    public function login(Request $request)
    {
        // Validasi input
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Cek apakah user dengan email tersebut ada
        $user = User::where('email', $credentials['email'])->first();

        if (!$user) {
            return back()->withErrors([
                'email' => 'Email belum terdaftar.',
            ])->withInput();
        }

        // Cek apakah password cocok
        if (!Hash::check($credentials['password'], $user->password)) {
            return back()->withErrors([
                'password' => 'Kata sandi salah.',
            ])->withInput();
        }

        // Login user dan buat sesi baru
        Auth::login($user);
        $request->session()->regenerate();

        // Arahkan sesuai peran
        switch ($user->peran) {
        case 'admin':
            return redirect()->route('admin_dashboard');
        case 'pengunjung':
            return redirect()->route('landing');
        default:
            return redirect('/dashboard1'); // fallback
        }
    }

    /**
     * Logout dan akhiri sesi pengguna.
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/dashboard1');
    }
}
