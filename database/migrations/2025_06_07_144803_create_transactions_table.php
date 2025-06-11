<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('transaksi', function (Blueprint $table) {
            $table->id();
            $table->id_pemesanan();
            $table->string('nama_pengujung');
            $table->string('paket_ruangan');
            $table->string('jenis_ruangan');
            $table->dateTime('tanggal_waktu');
            $table->string('status')->default('Diproses');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('transaksi');
    }
};