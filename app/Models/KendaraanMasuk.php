<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KendaraanMasuk extends Model
{
    protected $table = 'kendaraan_masuks';

    protected $fillable = [
        'waktu_masuk',
        'status_parkir',
        'id_kendaraan',
    ];

    public function kendaraan()
    {
        return $this->belongsTo(DataKendaraan::class, 'id_kendaraan');
    }

    public function kompensasi()
    {
        return $this->hasOne(Kompensasi::class, 'id_kendaraan_masuk');
    }

    public function kendaraanKeluar()
    {
        return $this->hasOne(KendaraanKeluar::class, 'id_kendaraan_masuk');
    }

    public function pembayaran()
    {
        return $this->hasOne(Pembayaran::class, 'id_kendaraan_masuk');
    }
}

