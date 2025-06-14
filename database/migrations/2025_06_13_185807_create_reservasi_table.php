<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        // If you need to create a new migration
        Schema::create('reservasi', function (Blueprint $table) {
            $table->string('Reservasi')->primary();
            $table->string('ruangan_id');
            $table->date('tanggal');
            $table->time('waktu_mulai');
            $table->time('waktu_selesai');
            $table->integer('durasi');
            $table->text('catatan')->nullable();
            $table->enum('metode', ['bank_transfer', 'e_wallet']);
            $table->unsignedBigInteger('user_id')->nullable();
            $table->timestamps();

            $table->foreign('ruangan_id')->references('id')->on('ruangan')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('reservasi');
    }
};