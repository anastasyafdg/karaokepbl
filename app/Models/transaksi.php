<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $table = 'transaksi'; // Specify the correct table name
    protected $primaryKey = 'id'; // Specify the primary key

    protected $fillable = [
        'id_pemesanan',
        'nama_pengunjung',
        'paket_ruangan',
        'jenis_ruangan',
        'tanggal_waktu',
        'status',
        'bukti_transaksi'
    ];

    protected $casts = [
        'tanggal_waktu' => 'datetime'
    ];
}