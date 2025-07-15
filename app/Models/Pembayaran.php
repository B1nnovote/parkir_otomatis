<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    protected $table = 'pembayarans';

    protected $fillable = [
        'id_kendaraan_masuk',
        'id_kendaraan_keluar',
        'id_kompensasi',
        'id_petugas',
        'total',
        'pembayaran',
    ];

    public function kendaraanMasuk()
    {
        return $this->belongsTo(KendaraanMasuk::class, 'id_kendaraan_masuk');
    }

    public function kendaraanKeluar()
    {
        return $this->belongsTo(KendaraanKeluar::class, 'id_kendaraan_keluar');
    }

    public function kompensasi()
    {
        return $this->belongsTo(Kompensasi::class, 'id_kompensasi');
    }

    public function keuangan()
    {
        return $this->hasOne(Keuangan::class, 'id_pembayaran');
    }

    public function petugas()
{
    return $this->belongsTo(User::class, 'id_petugas');
}

}

