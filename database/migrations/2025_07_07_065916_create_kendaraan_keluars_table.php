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
        Schema::create('kendaraan_keluars', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_kendaraan_masuk')->constrained('kendaraan_masuks')->onDelete('cascade');
            $table->timestamp('waktu_keluar');
            $table->enum('status_kondisi', ['baik', 'karcis hilang', 'kerusakan','kehilangan','merusak'])->default('baik');
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kendaraan_keluars');
    }
};
