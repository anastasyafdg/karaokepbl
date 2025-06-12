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

    // Menggunakan timestamps
    public $timestamps = true;

    // Field yang boleh diisi massal
    protected $fillable = [
        'id',
        'jenis',
        'paket',
        'kapasitas',
        'harga',
        'fasilitas',
        'jumlah_ruangan',
        'gambar'
    ];

    // Cast data types
    protected $casts = [
        'harga' => 'decimal:2',
        'jumlah_ruangan' => 'integer',
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

    // Accessor untuk format jumlah ruangan
    public function getFormattedJumlahRuanganAttribute()
    {
        return $this->jumlah_ruangan . ' ruangan';
    }

    // Accessor untuk status ketersediaan berdasarkan jumlah ruangan
    public function getStatusKetersediaanAttribute()
    {
        if ($this->jumlah_ruangan > 0) {
            return 'Tersedia';
        } else {
            return 'Tidak Tersedia';
        }
    }

    // Accessor untuk warna badge berdasarkan jumlah ruangan
    public function getStatusColorAttribute()
    {
        if ($this->jumlah_ruangan > 2) {
            return 'bg-green-100 text-green-800'; // Banyak ruangan tersedia
        } elseif ($this->jumlah_ruangan > 0) {
            return 'bg-yellow-100 text-yellow-800'; // Sedikit ruangan tersedia
        } else {
            return 'bg-red-100 text-red-800'; // Tidak ada ruangan tersedia
        }
    }

    // Scope untuk ruangan yang tersedia
    public function scopeTersedia($query)
    {
        return $query->where('jumlah_ruangan', '>', 0);
    }

    // Scope untuk ruangan tidak tersedia
    public function scopeTidakTersedia($query)
    {
        return $query->where('jumlah_ruangan', '=', 0);
    }
    protected $appends = ['formatted_harga', 'gambar_url'];

    public function toArray()
    {
        return [
            'id' => $this->id,
            'jenis' => $this->jenis,
            'paket' => $this->paket,
            'kapasitas' => $this->kapasitas,
            'harga' => $this->harga,
            'formatted_harga' => $this->formatted_harga,
            'fasilitas' => $this->fasilitas,
            'gambar' => $this->gambar,
            'gambar_url' => $this->gambar_url,
        ];
    }
}