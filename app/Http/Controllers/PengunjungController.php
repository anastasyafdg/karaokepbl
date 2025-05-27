<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengunjung;

class PengunjungController extends Controller
{
    public function index()
{
    $data = Pengunjung::where('peran', 'pengunjung')->get();

    $nama = [];
    $email = [];
    $no = [];

    foreach ($data as $user) {
        if (strtolower($user->nama) === 'mikeu pangpang') {
            continue;
        }

        $nama[] = $user->nama;
        $email[] = $user->email;
        $no[] = $user->no; 
    }

    return view('admin.data_pengunjung', compact('nama', 'email', 'no'));
}

}
