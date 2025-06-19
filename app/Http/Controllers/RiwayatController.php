<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservasi;
use App\Models\Pembayaran;
use Illuminate\Support\Facades\Auth;

class RiwayatController extends Controller
{
    public function index(Request $request)
    {
        $userId = Auth::id();
        $status = $request->query('status', 'all');
        
        $reservations = Reservasi::with(['ruangan', 'pembayaran'])
            ->where('user_id', $userId)
            ->when($status !== 'all', function ($query) use ($status) {
                $query->whereHas('pembayaran', function ($q) use ($status) {
                    $statusMap = [
                        'delayed' => 'Pending',
                        'confirmed' => 'Confirmed',
                        'completed' => 'Completed',
                        'rejected' => 'Cancelled'
                    ];
                    
                    if (array_key_exists($status, $statusMap)) {
                        $q->where('status', $statusMap[$status]);
                    }
                });
            })
            ->orderBy('tanggal', 'desc')
            ->orderBy('waktu_mulai', 'desc')
            ->get();
            
        return view('users.riwayat', [
            'reservations' => $reservations,
            'activeStatus' => $status
        ]);
    }
}