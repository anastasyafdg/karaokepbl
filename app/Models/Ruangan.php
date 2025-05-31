<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ruangan extends Model
{
    use HasFactory;
    
    protected $table = 'ruangan'; 

    protected $primaryKey = 'id';
    public $incrementing = false; // Karena primary key bukan auto increment
    protected $keyType = 'string'; // Primary key bertipe string
    
    // Jika tidak ingin menggunakan timestamps, set ke false
    // Jika ingin menggunakan timestamps, hapus baris ini atau set ke true
    public $timestamps = true; // Ubah ke true jika ingin menggunakan created_at dan updated_at

    // Field yang boleh diisi massal
    protected $fillable = [
        'id',
        'jenis',
        'paket',
        'kapasitas',
        'harga',
        'fasilitas',
        'gambar'
    ];

    // Cast data types
    protected $casts = [
        'harga' => 'decimal:2',
    ];

    // Accessor untuk format harga
    public function getFormattedHargaAttribute()
    {
        return 'Rp ' . number_format($this->harga, 0, ',', '.');
    }

    // Accessor untuk URL gambar
    public function getGambarUrlAttribute()
    {
        if ($this->gambar) {
            return asset('images/' . $this->gambar);
        }
        return asset('images/default-room.jpg'); // Gambar default jika tidak ada
    }
}