<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Reservasi extends Model
{
    protected $table = 'reservasi';
    public $incrementing = false;
    protected $keyType = 'string';

    protected static function booted()
    {
        static::creating(function ($reservasi) {
            $formattedDate = date('Ymd', strtotime($reservasi->tanggal));
            $baseId = $reservasi->ruangan_id . '-' . $formattedDate;
            
            // Count existing reservations for this room/date
            $count = Reservasi::where('id', 'like', $baseId.'%')->count();
            
            $reservasi->id = $baseId . '-' . ($count + 1);
        });
    }

   // app/Models/Reservasi.php
   protected $fillable = [
    'ruangan_id', 
    'user_id',
    'tanggal', 
    'waktu_mulai', 
    'waktu_selesai',
    'durasi', 
    'catatan', 
    'metode',
    'total_biaya', // Add this
    'status'       // Add this
];

    public function ruangan()
    {
        return $this->belongsTo(Ruangan::class, 'ruangan_id', 'id');
    }

    // Accessor untuk durasi dalam format jam
    public function getDurasiAttribute($value)
    {
        return $value . ' jam';
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}