<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;  
use Illuminate\Support\Facades\Hash;  

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('user', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('email')->unique();
            $table->string('no'); // nomor HP
            $table->enum('peran', ['pengunjung', 'admin']);
            $table->string('password');
        });

        // Tambahkan akun admin setelah tabel dibuat
        DB::table('user')->insert([
            'nama' => 'admin',
            'email' => 'adminmikkeu@gmail.com',
            'no' => '08123456789',
            'peran' => 'admin',
            'password' => Hash::make('admin1234'), 
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user');
    }
};