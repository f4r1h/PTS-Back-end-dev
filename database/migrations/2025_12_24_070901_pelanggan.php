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
    Schema::create(table: 'pelanggan', callback: function(blueprint $table):void{
            $table->id();
            $table->string('nama');
            $table->string('jenis');
            $table->string('nomer_identitas')->unique;
            $table->string('nama_perusahaan');
            $table->string('penanggungjawab');
            $table->string('alamat');
            $table->string('nomer_telpon')->unique;
            $table->string('tanggal_daftar');
            $table->string('email')->unique();
            $table->timestamp();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        schema::dropIfExist ('pelanggan');
    }
};
