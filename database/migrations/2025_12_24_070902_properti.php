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
    Schema::create(table: 'properti', callback: function(blueprint $table):void{
            $table->id();
            $table->string('nama_properti');
            $table->string('tipe_properti');
            $table->string('lokasi_properti');
            $table->string('luas_properti');
            $table->string('harga_sewa_per_bulan');
            $table->enum('kondisi', ['baik', 'perlu renovasi'])->default('baik');
            $table->enum('status_sewa',['tersedia', 'disewa', 'dipesan'])->default('tersedia');
            $table->string('foto_properti')->unique();
            $table->timestamp();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        schema::dropIfExist ('properti');
    }
};
