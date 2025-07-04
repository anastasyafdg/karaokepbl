<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class EditProfileController extends Controller
{
    public function edit()
    {
        $user = Auth::user(); // ambil user yang login
        return view('users.edit_profile', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
        ]);

        $user->nama = $request->name;
        $user->alamat = $request->alamat;
        $user->save();

        return redirect()->back()->with('success_modal', 'Profil berhasil diperbarui!');
    }

    public function updatePassword(Request $request)
{
    // Validasi input
    $request->validate([
        'old_password' => 'required',
        'new_password' => 'required|min:8',
        'new_password_confirmation' => 'required',
    ]);

    $user = Auth::user();

    // Cek apakah password lama sesuai
    if (!Hash::check($request->old_password, $user->password)) {
        return redirect()->back()->with('password_error_modal', 'Password lama tidak sesuai.');
    }

    // Cek apakah password baru dan konfirmasi cocok
    if ($request->new_password !== $request->new_password_confirmation) {
        return redirect()->back()->with('password_error_modal', 'Password baru dan konfirmasi tidak cocok.');
    }

    // Cek apakah password baru sama dengan password lama
    if (Hash::check($request->new_password, $user->password)) {
        return redirect()->back()->with('password_error_modal', 'Password baru tidak boleh sama dengan password lama.');
    }

    // Update password dengan yang baru
    $user->password = Hash::make($request->new_password);
    $user->save();
 
        return redirect()->back()->with('success_modal', 'Kata Sandi berhasil diperbarui!');
    }
}
