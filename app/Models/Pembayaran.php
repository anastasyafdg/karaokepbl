<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;

    protected $primaryKey = 'Pembayaran_id';
    public $incrementing = true;

    protected $fillable = [
        'Reservasi_id',
        'Bukti_Pembayaran',
        'Detail_pemebayaran',
        'No_rekening'
    ];

    public function reservasi()
    {
        return $this->belongsTo(Reservasi::class, 'Reservasi_id', 'Reservasi_id');
    }
}