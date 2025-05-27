<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ruangan extends Model
{
    protected $table = 'ruangan';

    protected $primaryKey = 'id';

    public $incrementing = false; // Matikan auto-increment
    protected $keyType = 'string'; // Pakai string, bukan integer
}
