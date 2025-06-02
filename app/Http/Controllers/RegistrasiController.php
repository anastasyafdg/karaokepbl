<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegistrasiController extends Controller
{
    public function index()
    {
        return view('auth.registrasi'); 
    }

    public function register(Request $request)
{
    $validator = Validator::make($request->all(), [
        'nama' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:user,email',
        'nomor' => 'required|string|max:15|unique:user,no',
        'password' => 'required|string|min:8|confirmed',
    ]);

    if ($validator->fails()) {
        return redirect()->back()
            ->withErrors($validator)
            ->withInput();
    }

    User::create([
        'nama' => $request->nama,
        'email' => $request->email,
        'no' => $request->nomor,
        'password' => Hash::make($request->password),
        'peran' => 'pengunjung',
    ]);

    return redirect('/login')->with('success', 'Registrasi berhasil! Silakan login.');
}
}