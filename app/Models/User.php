<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'user'; // karena nama tabel kamu adalah 'user'

    public $timestamps = false;  // <--- tambahkan ini supaya Laravel gak pakai timestamps

    protected $fillable = [
        'nama',
        'email',
        'no',
        'password',
        'peran',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
}
