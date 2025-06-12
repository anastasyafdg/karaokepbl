<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;

    protected $table = 'pembayaran';
    
    protected $fillable = [
        'reservasi_id',
        'total_biaya',
        'no_rekening',
        'tanggal_pembayaran',
        'bukti_pembayaran',
        'status'
    ];

    protected $casts = [
        'tanggal_pembayaran' => 'datetime',
    ];
    
    public function reservasi()
    {
        return $this->belongsTo(Reservasi::class);
    }
}