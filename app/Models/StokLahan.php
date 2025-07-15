<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StokLahan extends Model
{
    protected $table = 'stok_lahans';

    protected $fillable = [
        'jenis_kendaraan',
        'total_slot',
        'terpakai',
    ];
}
