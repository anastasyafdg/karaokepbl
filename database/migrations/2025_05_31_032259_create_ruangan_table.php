<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('ruangan', function (Blueprint $table) {
            $table->string('id', 50)->primary(); // String primary key
            $table->enum('jenis', ['kecil', 'sedang', 'besar']);
            $table->enum('paket', ['A', 'B', 'C']);
            $table->string('kapasitas', 255);
            $table->decimal('harga', 15, 2); // Untuk harga dengan 2 desimal
            $table->text('fasilitas');
            $table->string('gambar', 255)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ruangan');
    }
};