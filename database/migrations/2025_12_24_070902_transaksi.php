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
    Schema::create(table: 'transaksi', callback: function(blueprint $table):void{
            $table->id();
            $table->string('tanggal_transaksi');
            $table->enum('jenis_transaksi', ['sewa', 'proyek', 'lainnya'])->default('sewa');
            $table->enum('metode_transaksi', ['transfer', 'tunai', 'kredit'])->default('transfer');
            $table->string('total_bayar');
            $table->enum('status_pembayaran',['lunas','belum lunas','cicil'])->default('belum lunas');
            $table->foreignId('pelanggan_id')->constrained()->cascadeOnDelete();
            $table->foreignId('properti_id')->constrained()->cascadeOnDelete();
            $table->timestamp();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        schema::dropIfExist ('transaksi');
    }
};
