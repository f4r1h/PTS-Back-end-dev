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
    Schema::create(table: 'alat_berat', callback: function(blueprint $table):void{
            $table->id();
            $table->string('nama_alat');
            $table->string('tipe_alat');
            $table->string('kode_unit')->unique();
            $table->string('spesifikasi');
            $table->string('harga_sewa_per_hari');
            $table->enum('kondisi', ['baik', 'maintenance', 'rusak'])->default('baik');
            $table->enum('status_sewa', ['tersedia', 'disewa', 'dipesan'])->default('tersedia');
            $table->string('lokasi_sekarang');
            $table->string('foto_alat')->unique();
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        schema::dropIfExist ('alat_berat');
    }
};
