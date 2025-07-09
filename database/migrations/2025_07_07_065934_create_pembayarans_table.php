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
        Schema::create('pembayarans', function (Blueprint $table) {
                $table->id();
                $table->foreignId('id_kendaraan_masuk')->constrained('kendaraan_masuks')->onDelete('cascade');
                $table->foreignId('id_kendaraan_keluar')->constrained('kendaraan_keluars')->onDelete('cascade');
                $table->foreignId('id_kompensasi')->nullable()->constrained('kompensasi')->onDelete('set null');
                $table->decimal('total', 10, 2);
                $table->enum('pembayaran', ['tunai','qris', 'gratis']);
                $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembayarans');
    }
};
