<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KendaraanKeluar extends Model
{
    protected $table = 'kendaraan_keluars';

    protected $fillable = [
        'id_kendaraan_masuk',
        'waktu_keluar',
        'status',
    ];

    public function kendaraanMasuk()
    {
        return $this->belongsTo(KendaraanMasuk::class, 'id_kendaraan_masuk');
    }

    public function pembayaran()
    {
        return $this->hasOne(Pembayaran::class, 'id_kendaraan_keluar');
    }
}
