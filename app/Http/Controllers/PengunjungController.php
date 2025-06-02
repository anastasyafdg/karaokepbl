<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class PengunjungController extends Controller
{
    public function index()
    {
        // Ambil semua user yang berperan 'pengunjung'
        $data = User::where('peran', 'pengunjung')->get();

        $pengunjung = $data->filter(function ($user) {
            return strtolower($user->nama) !== 'mikeu pangpang';
        });

        return view('admin.data_pengunjung', compact('pengunjung'));
    }
}
