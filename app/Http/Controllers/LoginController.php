<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class LoginController extends Controller
{
    /**
     * Menampilkan halaman login.
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }

    /**
     * Menangani proses login berdasarkan peran (admin atau pengunjung).
     */
    public function login(Request $request)
    {
        // Validasi input login
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Cari user berdasarkan email
        $user = User::where('email', $credentials['email'])->first();

        // Jika user tidak ditemukan
        if (!$user) {
            return back()->withErrors(['email' => 'Email belum terdaftar.'])->withInput();
        }

        // Cek kecocokan password
        if (!Hash::check($credentials['password'], $user->password)) {
            return back()->withErrors(['password' => 'Kata sandi salah.'])->withInput();
        }

        // Tentukan guard sesuai peran user
        $guard = $user->peran === 'admin' ? 'admin' : 'web';

        // Login manual tanpa attempt (karena password sudah diverifikasi)
        Auth::guard($guard)->login($user);
        $request->session()->regenerate();

        // Redirect berdasarkan peran
        return match ($user->peran) {
            'admin' => redirect()->route('admin_dashboard'),
            'pengunjung' => redirect()->route('landing'),
            default => redirect('/dashboard1'),
        };
    }

    /**
     * Logout dari guard yang sedang aktif.
     */
    public function logout(Request $request)
    {
        if (Auth::guard('web')->check()) {
        Auth::guard('web')->logout();
        }

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/dashboard1');
    }
}
