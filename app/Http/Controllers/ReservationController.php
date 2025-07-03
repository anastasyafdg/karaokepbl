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
        $slotWaktu = [
            '10:00', '11:00', '12:00', '13:00', '14:00', '15:00',
            '16:00', '17:00', '18:00', '19:00', '20:00', '21:00',
        ];
    
        $bookedSlots = [];
        if (request()->has('tanggal')) {
            $tanggal = request()->get('tanggal');
            $reservations = reservasi::where('ruangan_id', $id)
                ->where('tanggal', $tanggal)
                ->get();
    
            foreach ($reservations as $res) {
                $start = Carbon::parse($res->waktu_mulai);
                $end = Carbon::parse($res->waktu_selesai);
                
                while ($start < $end) {
                    $bookedSlots[] = $start->format('H:i');
                    $start->addHour();
                }
            }
        }
    
        return view('users.halaman_reservasi', [
            'ruangan' => $ruangan,
            'slotWaktu' => $slotWaktu,
            'bookedSlots' => array_unique($bookedSlots),
        ]);
    }
    
    public function checkAvailability($id)
    {
        $date = request()->query('tanggal');
        
        $reservations = reservasi::where('ruangan_id', $id)
            ->where('tanggal', $date)
            ->get();
    
        $bookedSlots = [];
        foreach ($reservations as $res) {
            $start = Carbon::parse($res->waktu_mulai);
            $end = Carbon::parse($res->waktu_selesai);
            
            while ($start < $end) {
                $bookedSlots[] = $start->format('H:i');
                $start->addHour();
            }
        }
    
        return response()->json(array_unique($bookedSlots));
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'ruangan_id' => 'required|exists:ruangan,id',
            'tanggal' => 'required|date',
            'waktu_mulai' => 'required',
            'waktu_selesai' => 'required',
            'metode_pembayaran' => 'required|string',
        ]);
    
        try {
            $user = Auth::user();
            $ruangan = Ruangan::findOrFail($validated['ruangan_id']);
    
            // Check room availability
            if ($ruangan->jumlah_ruangan <= 0) {
                return back()->with('error', 'Ruangan tidak tersedia!')->withInput();
            }
    
            // Check time slot availability
            $isSlotAvailable = $this->checkTimeSlotAvailability(
                $validated['ruangan_id'],
                $validated['tanggal'],
                $validated['waktu_mulai'],
                $validated['waktu_selesai']
            );
    
            if (!$isSlotAvailable) {
                return back()->with('error', 'Slot waktu tidak tersedia!')->withInput();
            }
    
            // Create reservation
            $reservasi = reservasi::create([
                'user_id' => $user->id,
                'ruangan_id' => $validated['ruangan_id'],
                'tanggal' => $validated['tanggal'],
                'waktu_mulai' => $validated['waktu_mulai'],
                'waktu_selesai' => $validated['waktu_selesai'],
                'durasi' => $this->calculateDuration($validated['waktu_mulai'], $validated['waktu_selesai']),
                'metode_pembayaran' => $validated['metode_pembayaran'],
                'catatan' => $request->catatan,
                'status' => 'pending',
            ]);
    
            // Decrease room quantity
            $ruangan->decrement('jumlah_ruangan');
    
            return redirect()->route('users.konfirmasi_pembayaran', $reservasi->id)
                ->with('success', 'Reservasi berhasil disimpan, silakan lakukan pembayaran.');
    
        } catch (\Exception $e) {
            return back()->with('error', 'Terjadi kesalahan: '.$e->getMessage())->withInput();
        }
    }
    
    private function checkTimeSlotAvailability($ruanganId, $tanggal, $waktuMulai, $waktuSelesai)
    {
        return reservasi::where('ruangan_id', $ruanganId)
            ->where('tanggal', $tanggal)
            ->where(function($query) use ($waktuMulai, $waktuSelesai) {
                // Only check for overlapping reservations that aren't exactly adjacent
                $query->where(function($q) use ($waktuMulai, $waktuSelesai) {
                    $q->where('waktu_mulai', '<', $waktuSelesai)
                      ->where('waktu_selesai', '>', $waktuMulai);
                });
            })
            ->doesntExist();
    }
    
    private function calculateDuration($waktuMulai, $waktuSelesai)
    {
        $start = Carbon::parse($waktuMulai);
        $end = Carbon::parse($waktuSelesai);
        return max(1, $start->diffInHours($end));
    }
}