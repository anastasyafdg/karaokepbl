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

        return redirect()->back()->with('success', 'Profil berhasil diperbarui.');
    }

    // Method untuk update password
    public function updatePassword(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed|min:8',
        ]);

        // Cek apakah password lama sesuai
        if (!Hash::check($request->old_password, Auth::user()->password)) {
            return back()->withErrors(['old_password' => 'Password lama tidak sesuai.']);
        }

        // Update password dengan yang baru
        $user = Auth::user();
        $user->password = Hash::make($request->new_password);
        $user->save();

        return back()->with('success', 'Password berhasil diperbarui.');
    }
}
