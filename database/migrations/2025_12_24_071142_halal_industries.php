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
    Schema::create(table: 'halal_industries', callback: function(blueprint $table):void{
            $table->id();
            $table->string('pelanggan');
            $table->string('alat_berat');
            $table->string('properti');
            $table->string('transaksi');
            $table->string('jadwal_alat');
            $table->string('operator');
            $table->string('laporan_pekerjaan');
            $table->string('admin')->unique();
            $table->string('email');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        schema::dropIfExist ('halal_industries');
    }
};
