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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal_order');
            $table->unsignedBigInteger('customer_id'); // FK ke tabel Customer
            $table->unsignedBigInteger('kendaraan_id'); // FK ke tabel Kendaraan
            $table->timestamps();

            // hubungan dengan tabel Customer
            $table->foreign('customer_id')->references('id')->on('customers');

            // hubungan dengan tabel Kendaraan
            $table->foreign('kendaraan_id')->references('id')->on('kendaraans');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
