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
        Schema::create('hargas', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal_awal');
            $table->date('tanggal_akhir');
            $table->enum('jenis', ['1', '2', '3'])->comment('1: B40, 2: HSFO, 3: LSFO');
            $table->integer('harga_1');
            $table->integer('harga_2');
            $table->integer('harga_3');
            $table->integer('harga_4');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hargas');
    }
};
