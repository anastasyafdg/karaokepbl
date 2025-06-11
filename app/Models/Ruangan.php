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
        'status',
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

    // Accessor untuk status dengan format yang lebih user-friendly
    public function getFormattedStatusAttribute()
    {
        $statuses = [
            'tersedia' => 'Tersedia',
            'terpakai' => 'Terpakai',
            'tidak_tersedia' => 'Tidak Tersedia'
        ];
        
        return $statuses[$this->status] ?? $this->status;
    }

    // Accessor untuk warna badge status
    public function getStatusColorAttribute()
    {
        $colors = [
            'tersedia' => 'bg-green-100 text-green-800',
            'terpakai' => 'bg-yellow-100 text-yellow-800',
            'tidak_tersedia' => 'bg-red-100 text-red-800'
        ];
        
        return $colors[$this->status] ?? 'bg-gray-100 text-gray-800';
    }
}