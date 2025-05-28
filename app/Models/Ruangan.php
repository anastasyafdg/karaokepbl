<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ruangan extends Model
{
    protected $table = 'ruangan'; 

    protected $primaryKey = 'id';
    public $incrementing = false;
    public $timestamps = false;
    protected $keyType = 'string';

    // Tambahkan semua field yang boleh diisi massal
    protected $fillable = [
        'id',
        'jenis',
        'paket',
        'kapasitas',
        'harga',
        'fasilitas',
        'gambar'
    ];
}
