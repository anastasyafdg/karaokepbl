<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminLoginController extends Controller
{
    /**
     * Tampilkan halaman login admin.
     */
    public function showLoginForm()
    {
        return view('auth.admin-login');
    }

    /**
     * Proses login admin secara manual menggunakan guard:admin.
     */
    public function login(Request $request)
    {
        // Validasi form
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Ambil user berdasarkan email
        $user = User::where('email', $credentials['email'])->first();

        // Cek apakah user ada dan merupakan admin
        if (!$user || $user->peran !== 'admin') {
            return back()->withErrors([
                'email' => 'Email tidak ditemukan atau bukan admin.',
            ])->withInput();
        }

        // Cek password
        if (!Hash::check($credentials['password'], $user->password)) {
            return back()->withErrors([
                'password' => 'Password salah.',
            ])->withInput();
        }

        // Login secara manual via guard admin
        Auth::guard('admin')->login($user);
        $request->session()->regenerate();

        return redirect()->route('admin_dashboard'); // atau intended
    }

    /**
     * Logout admin dari guard admin.
     */
    public function logout(Request $request)
    {
        if (Auth::guard('admin')->check()) {
        Auth::guard('admin')->logout();
        }

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login'); // atau '/admin/login'
    }
}
