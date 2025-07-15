<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Keuangan extends Model
{
    protected $table = 'keuangans';

    protected $fillable = [
        'jumlah',
        'id_pembayaran',
        'keterangan',
        'jenis_transaksi',
        'waktu_transaksi',
    ];

    public function pembayaran()
    {
        return $this->belongsTo(Pembayaran::class, 'id_pembayaran');
    }
}
