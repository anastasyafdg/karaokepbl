<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'comment',
        'rating',
        'status'
    ];

    protected $casts = [
        'rating' => 'integer'
    ];

    // Format rating bintang
    public function getStarRatingAttribute()
    {
        return str_repeat('★', $this->rating) . str_repeat('☆', 5 - $this->rating);
    }

    // Format tanggal
    public function getFormattedDateAttribute()
    {
        return $this->created_at->format('d M Y');
    }

    // Ambil huruf pertama dari nama untuk avatarInitial
    public function getAvatarInitialAttribute()
    {
        return strtoupper(substr($this->name, 0, 1));
    }

    // Tentukan warna avatar berdasarkan huruf awal nama
    public function getAvatarColorAttribute()
    {
        $colors = ['red', 'green', 'blue', 'yellow', 'purple', 'pink', 'indigo'];
        return $colors[ord(strtoupper($this->name[0])) % count($colors)];
    }
}
