<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
     Schema::create(table: 'jadwal_alat', callback: function(blueprint $table):void{
            $table->id();
            $table->string('tanggal_mulai')->unique();
            $table->string('tanggal_selesai');
            $table->enum('status_jadwal', ['dijadwalkan', 'sedang berjalan', 'selesai'])->default('selesai');
            $table->foreignId('alat_berat_id')->constrained('alat_berat')->cascadeOnDelete();
            $table->foreignId('transaksi_id')->constrained('transaksi')->cascadeOnDelete();
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        schema::dropIfExist ('jadwal_alat');
    }
};
