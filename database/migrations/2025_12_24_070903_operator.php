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
    Schema::create(table: 'operator', callback: function(blueprint $table):void{
            $table->id();
            $table->string('nama_operator');
            $table->string('no_hp')->unique;
            $table->string('alamat');
            $table->enum('status_operator', ['aktif', 'nonaktif'])->default('aktif');
            $table->string('penanggungjawab');
            $table->foreignId('alat_berat_id')->constrained()->cascadeOnDelete();
            $table->timestamp();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        schema::dropIfExist ('operator');
    }
};
