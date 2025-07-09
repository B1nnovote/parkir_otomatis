<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kompensasi extends Model
{
    protected $table = 'kompensasi';

    protected $fillable = [
        'id_kendaraan_masuk',
        'tipe_kompensasi',
        'nama_pemilik',
        'keterangan',
    ];

    public function kendaraanMasuk()
    {
        return $this->belongsTo(KendaraanMasuk::class, 'id_kendaraan_masuk');
    }

    public function pembayaran()
    {
        return $this->hasOne(Pembayaran::class, 'id_kompensasi');
    }
}
