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
        'status'
    ];

    protected $casts = [
        'tanggal_pembayaran' => 'datetime',
    ];
    
    public function reservasi()
    {
        return $this->belongsTo(Reservasi::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    protected static function boot()
    {
        parent::boot();
    
        static::creating(function ($model) {
            // Remove the custom ID generation
            // Set default status
            $model->status = 'Pending';
            
            // Set tanggal_pembayaran to current time
            $model->tanggal_pembayaran = now();
        });
    }
}