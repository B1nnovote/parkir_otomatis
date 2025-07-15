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
        Schema::create('stok_lahans', function (Blueprint $table) {
            $table->id();
            $table->enum('jenis_kendaraan', ['motor', 'mobil']);
            $table->integer('total_slot');           
            $table->integer('terpakai')->default(0);
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stok_lahans');
    }
};
