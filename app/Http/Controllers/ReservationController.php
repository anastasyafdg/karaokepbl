<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function showReservationForm()
    {
        return view('users.halaman_reservasi');
    }
}
