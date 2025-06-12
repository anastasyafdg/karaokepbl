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
            // Format ID: ruangan_id-tanggal (YYYYMMDD)
            $formattedDate = date('Ymd', strtotime($reservasi->tanggal));
            $reservasi->id = $reservasi->ruangan_id . '-' . $formattedDate;
        });
    }

    protected $fillable = [
        'ruangan_id', 'tanggal', 'waktu_mulai', 'waktu_selesai',
        'durasi', 'catatan', 'metode'
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
}