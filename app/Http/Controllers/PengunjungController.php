<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class PengunjungController extends Controller
{
    public function index()
    {
        $pengunjung = User::where('peran', 'pengunjung')
                        ->whereRaw("LOWER(nama) != ?", ['mikeu pangpang'])
                        ->paginate(10);

        return view('admin.data_pengunjung', compact('pengunjung'));
    }
}
