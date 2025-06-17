<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Ruangan;
use App\Models\reservasi;
use Carbon\Carbon;

class ReservationController extends Controller
{
    public function showForm($id)
    {
        $ruangan = Ruangan::findOrFail($id);
        $reservasi = new reservasi();

        // Slot waktu tetap
        $slotWaktu = [
            '10:00', '11:00', '12:00', '13:00', '14:00', '15:00',
            '16:00', '17:00', '18:00', '19:00', '20:00', '21:00',
        ];

        $slotTidakTersedia = [];

        if (request()->has('tanggal')) {
            $tanggal = request()->get('tanggal');

            // Ambil semua slot yang sudah dipesan untuk tanggal & ruangan itu
            $reservasi = reservasi::where('ruangan_id', $id)
                ->where('tanggal', $tanggal)
                ->get();

            foreach ($reservasi as $r) {
                $mulaiIndex = array_search($r->waktu_mulai, $slotWaktu);
                $selesaiIndex = array_search($r->waktu_selesai, $slotWaktu);
                if ($mulaiIndex !== false && $selesaiIndex !== false) {
                    for ($i = $mulaiIndex; $i < $selesaiIndex; $i++) {
                        $slotTidakTersedia[] = $slotWaktu[$i];
                    }
                }
            }
        }

        return view('users.halaman_reservasi', [
            'ruangan' => $ruangan,
            'slotWaktu' => $slotWaktu,
            'slot_tidak_tersedia' => $slotTidakTersedia, // ← ini kuncinya!
        ]);
    }

    public function store(Request $request)
    {
    $request->validate([
        'ruangan_id' => 'required|exists:ruangan,id',
        'tanggal' => 'required|date',
        'waktu_mulai' => 'required',
        'waktu_selesai' => 'required',
        'metode_pembayaran' => 'required|string',
    ]);

    $user = Auth::user();

    $waktuMulai = Carbon::parse($request->waktu_mulai);
    $waktuSelesai = Carbon::parse($request->waktu_selesai);
    $durasi = $waktuSelesai->diffInHours($waktuMulai);

    $reservasi = reservasi::create([
        'user_id' => $user->id,
        'ruangan_id' => $request->ruangan_id,
        'tanggal' => $request->tanggal,
        'waktu_mulai' => $request->waktu_mulai,
        'waktu_selesai' => $request->waktu_selesai,
        'durasi' => $durasi,
        'metode_pembayaran' => $request->metode_pembayaran,
        'catatan' => $request->catatan,
        'total_harga' => $request->total_harga,
        'status' => 'pending',
    ]);

    // ✅ Tambahkan redirect ke halaman konfirmasi
    return redirect()->route('users.konfirmasi_pembayaran', $reservasi->id)
        ->with('success', 'Reservasi berhasil disimpan, silakan lakukan pembayaran.');
}
}