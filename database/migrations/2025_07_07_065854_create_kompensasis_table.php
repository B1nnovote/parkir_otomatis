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
            $table->unsignedBigInteger('jumlah');
            $table->enum('status', ['pending', 'disetujui', 'ditolak'])->default('pending');
            $table->string('nama_pemilik')->nullable();
            $table->string('bukti_foto')->nullable();
            $table->text('keterangan')->nullable();
            $table->timestamp('diajukan_pada')->nullable();
            $table->timestamp('diproses_pada')->nullable();

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
