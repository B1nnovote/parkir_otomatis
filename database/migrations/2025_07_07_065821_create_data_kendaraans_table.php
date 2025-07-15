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
        Schema::create('data_kendaraans', function (Blueprint $table) {
            $table->id();
            $table->string('no_polisi')->unique();
            $table->enum('jenis_kendaraan', ['mobil', 'motor']);
            $table->string('pemilik')->nullable(); 
            $table->enum('status_pemilik', ['tamu', 'guru','karyawan']);
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_kendaraans');
    }
};
