<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('transaksi', function (Blueprint $table) {
            $table->string('jenis_transaksi')->change();
            $table->string('metode_transaksi')->change();
            $table->string('status_pembayaran')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('transaksi', function (Blueprint $table) {
            $table->enum('jenis_transaksi', ['sewa', 'proyek', 'lainnya'])->default('sewa')->change();
            $table->enum('metode_transaksi', ['transfer', 'tunai', 'kredit'])->default('transfer')->change();
            $table->enum('status_pembayaran', ['lunas', 'belum lunas', 'cicil'])->default('belum lunas')->change();
        });
    }
};
