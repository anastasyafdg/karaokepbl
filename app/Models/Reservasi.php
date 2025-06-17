<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Reservasi extends Model
{
    protected $table = 'reservasi';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'ruangan_id',
        'tanggal',
        'waktu_mulai',
        'waktu_selesai',
        'durasi',
        'catatan',
        'metode',
        'bukti_transfer',
        'total_pembayaran',
        'status'
    ];

    protected static function booted()
    {
        static::creating(function ($reservasi) {
            $formattedDate = date('Ymd', strtotime($reservasi->tanggal));
            $baseId = $reservasi->ruangan_id . '-' . $formattedDate;
            
            $count = Reservasi::where('id', 'like', $baseId.'%')->count();
            $reservasi->id = $baseId . '-' . ($count + 1);
        });
    }

    public function ruangan()
    {
        return $this->belongsTo(Ruangan::class, 'ruangan_id', 'id');
    }

    public function getDurasiAttribute($value)
    {
        return $value . ' jam';
    }

    // Accessor for bukti_transfer URL
    public function getBuktiTransferUrlAttribute()
    {
        return $this->bukti_transfer ? asset($this->bukti_transfer) : null;
    }

    // Accessor for total biaya calculation
    public function getTotalBiayaAttribute($value)
    {
        // Pastikan bahwa nilai total biaya valid dan dihitung jika belum ada
        if (!is_null($value)) {
            return (float)$value;
        }

        // Menghitung total biaya berdasarkan durasi dan harga_per_jam
        $durasi = is_numeric($this->durasi) ? (float)$this->durasi : 0.0;
        $hargaPerJam = optional($this->ruangan)->harga_per_jam ? (float)$this->ruangan->harga_per_jam : 0.0;

        return $durasi * $hargaPerJam;
    }
}
