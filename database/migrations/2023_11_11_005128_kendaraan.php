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
        Schema::create('kendaraans', function (Blueprint $table) {
            $table->id('id');
            $table->string('model');
            $table->string('jenis');
            $table->string('tahun');
            $table->string('jumlah_penumpang');
            $table->string('manufaktur');
            $table->integer('harga');
            $table->string('bahan_bakar')->nullable;
            $table->string('luas_bagasi')->nullable;
            $table->string('jumlah_roda')->nullable;
            $table->string('luas_kargo')->nullable;
            $table->string('ukuran_bagasi')->nullable;
            $table->string('kapasitas_bensin')->nullable;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kendaraans');
    }
};
