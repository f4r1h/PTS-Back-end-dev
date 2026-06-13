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
        Schema::create('rental_applications', function (Blueprint $table) {
            $table->id();

            
            $table->foreignId('pelanggan_id')
                  ->constrained('pelanggan')
                  ->cascadeOnDelete();

            
            $table->foreignId('alat_berat_id')
                  ->constrained('alat_berat')
                  ->cascadeOnDelete();

            $table->integer('duration_months');
            $table->text('message')->nullable();

            $table->enum('status', [
                'pending',
                'approved',
                'rejected',
                'cancelled'
            ])->default('pending');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rental_applications');
    }
};