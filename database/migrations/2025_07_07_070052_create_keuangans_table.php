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
        Schema::create('keuangans', function (Blueprint $table) {
            $table->id();
            $table->decimal('jumlah', 10, 2);
            $table->foreignId('id_pembayaran')->constrained('pembayarans')->onDelete('cascade');
            $table->string('keterangan');
            $table->string('jenis_transaksi');
            $table->timestamp('waktu_transaksi');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('keuangans');
    }
};
