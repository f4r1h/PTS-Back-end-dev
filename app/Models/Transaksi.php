<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaksi extends Model
{
    use HasFactory;

    protected $table = 'transaksi';

    protected $fillable = [
        'jenis_transaksi',
        'tanggal_transaksi',
        'metode_transaksi',
        'total_bayar',
        'status_pembayaran',
        'pelanggan_id',
        'properti_id',
     ];

     public function pelanggan()
     {
         return $this->belongsTo(Pelanggan::class, 'pelanggan_id');
     }

     public function properti()
     {
         return $this->belongsTo(Properti::class, 'properti_id');
     }

     public function jadwal_alat()
     {
         return $this->hasMany(Jadwal_alat::class, 'transaksi_id');
     }
}
