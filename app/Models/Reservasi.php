<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservasi extends Model
{
    use HasFactory;

    protected $primaryKey = 'Reservasi_id';
    public $incrementing = true;

    protected $fillable = [
        'Ruangan_id',
        'tanggal_reservasi',
        'durasi',
        'jam_mulai',
        'jam_akhir'
    ];

    public function pembayaran()
    {
        return $this->hasOne(Pembayaran::class, 'Reservasi_id', 'Reservasi_id');
    }
}