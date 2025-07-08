<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;

    protected $table = 'pembayaran';
    
    protected $fillable = [
        'id',
        'reservasi_id',
        'user_id',
        'total_biaya',
        'tanggal_pembayaran',
        'bukti_pembayaran',
        'status',
        'user_id',
    ];

    protected $casts = [
        'tanggal_pembayaran' => 'datetime',
    ];
    
    public function reservasi() {
    return $this->belongsTo(Reservasi::class, 'reservasi_id');
}

    public function pengunjung() {
    return $this->belongsTo(Pengunjung::class, 'pengunjung_id');
}
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    protected static function boot()
{
    parent::boot();

    static::creating(function ($model) {
        $model->status = 'Pending'; // Matches your enum in pembayaran table
        $model->tanggal_pembayaran = now();
    });
}
}