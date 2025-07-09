<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DataKendaraan extends Model
{
    protected $table = 'data_kendaraans';

    protected $fillable = [
        'no_polisi',
        'jenis_kendaraan',
        'pemilik',
        'status_pemilik',
    ];

    public function kendaraanMasuks()
    {
        return $this->hasMany(KendaraanMasuk::class, 'id_kendaraan');
    }
}
