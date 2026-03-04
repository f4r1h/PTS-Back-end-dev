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
    Schema::create(table: 'admin', callback: function(blueprint $table):void{
            $table->id();
            $table->string('nama_admin');
            $table->string('username');
            $table->string('password')->unique;
            $table->enum('penanggungjawab', ['super admin', 'alat berat', 'jadwal alat', 'operator', 'properti', 'transaksi'])->default('super admin');
            $table->string('nomer_telpon')->unique;
            $table->string('email')->unique();
            $table->timestamp();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        schema::dropIfExist ('admin');
    }
};
