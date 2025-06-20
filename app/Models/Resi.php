<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resi extends Model
{
    use HasFactory;

    protected $table = 'resi';

    protected $fillable = [
        'pembayaran_id',
        'detail_pemesanan',
        'detail_pembayaran',
    ];

    public function pembayaran()
    {
        return $this->belongsTo(Pembayaran::class);
    }
}
