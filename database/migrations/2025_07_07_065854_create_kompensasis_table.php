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
        Schema::create('kompensasi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_kendaraan_masuk')->constrained('kendaraan_masuks')->onDelete('cascade');
            $table->enum('tipe_kompensasi', ['Internal', 'Eksternal'])->default('Internal');
            $table->string('nama_pemilik');
            $table->text('keterangan');
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kompensasis');
    }
};
