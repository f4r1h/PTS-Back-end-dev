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
        Schema::table('transaksi', function (Blueprint $table) {
            // Drop foreign key referencing properti
            $table->dropForeign('transaksi_properti_id_foreign');
            
            // Re-add foreign key referencing alat_berat
            $table->foreign('properti_id')
                  ->references('id')
                  ->on('alat_berat')
                  ->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('transaksi', function (Blueprint $table) {
            // Drop foreign key referencing alat_berat
            $table->dropForeign(['properti_id']);
            
            // Re-add foreign key referencing properti
            $table->foreign('properti_id')
                  ->references('id')
                  ->on('properti')
                  ->cascadeOnDelete();
        });
    }
};
