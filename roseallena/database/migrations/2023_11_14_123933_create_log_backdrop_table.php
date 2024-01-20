<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('log_backdrops', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal_sewa');
            $table->foreignId('user_id')->constrained('users');
            $table->date('tanggal_kembali');
            // $table->string('bukti_pembayaran');
            $table->integer('harga_sewa');
            $table->text('deskripsi');
            $table->string('status_payment');
            $table->string('total_dp')->nullable();
            $table->foreignId('backdrop_id')->constrained('backdrops');
            $table->string('status_dikembalikan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('log_backdrop');
    }
};
