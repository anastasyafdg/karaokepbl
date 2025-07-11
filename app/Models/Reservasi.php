<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Ruangan;

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
        'status',
        'user_id', 
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

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function getDurasiAttribute($value)
    {
        return $value . ' jam';
    }
    public function pembayaran()
{
    return $this->hasOne(Pembayaran::class, 'reservasi_id', 'id');
}
}
