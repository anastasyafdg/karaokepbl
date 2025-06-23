<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pembayaran;


class ResiController extends Controller
{
    public function show($reservasi_id)
    {
        $pembayaran = Pembayaran::with(['reservasi.ruangan'])
                        ->where('reservasi_id', $reservasi_id)
                        ->firstOrFail();

        return view('resi.show', compact('pembayaran'));
    }
}
