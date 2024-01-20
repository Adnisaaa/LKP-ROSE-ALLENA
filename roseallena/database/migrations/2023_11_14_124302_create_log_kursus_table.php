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
        Schema::create('log_kursuses', function (Blueprint $table) {
            $table->id();
            $table->date('tgl_kursus');
            $table->string('status_payment');
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('kursuses_id')->constrained('kursuses');
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
        Schema::dropIfExists('log_kursus');
    }
};
