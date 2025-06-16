<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ruangan;
use App\Models\User;
use App\Models\Review;
use App\Models\Pesan;
use App\Models\Reservasi;
use App\Models\Pembayaran;

class AdmDashboardController extends Controller
{
    public function index()
{
        return view('admin.admin_dashboard', [
            'totalRuangan' => Ruangan::count(),
            'totalPengunjung' => User::where('peran', 'pengunjung')->count(),
            'totalUlasan' => Review::count(),
            'totalPesan' => Pesan::count(),
            'totalReservasi' => Reservasi::count(),
            'totalPembayaran' => Pembayaran::count(),
        ]);
}
}
