<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('pembayaran', function (Blueprint $table) {
            $table->id();
            $table->char('reservasi_id', 36);
            $table->decimal('total_biaya', 10, 2);
            $table->string('no_rekening', 20)->nullable();
            $table->dateTime('tanggal_pembayaran');
            $table->string('bukti_pembayaran')->nullable();
            $table->enum('status', ['Terkonfirmasi', 'Pending', 'Batal']);
            $table->timestamps();

            $table->foreign('reservasi_id')->references('id')->on('reservasi');
        });
    }

    public function down()
    {
        Schema::dropIfExists('pembayaran');
    }
};