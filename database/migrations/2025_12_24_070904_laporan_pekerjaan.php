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
    Schema::create(table: 'laporan_pekerjaan', callback: function(blueprint $table):void{
            $table->id();
            $table->string('tanggal_laporan')->unique();
            $table->string('jam_kerja_alat');
            $table->string('bahan_bakar_terpakai');
            $table->string('catatan_kondisi');
            $table->string('foto_laporan');
            $table->foreignId('jadwal_alat_id')->constrained('jadwal_alat');
            $table->foreignId('operator_id')->constrained('operator');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        schema::dropIfExist ('laporan_pekerjaan');
    }
};
