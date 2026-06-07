<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Properti extends Model
{
    use HasFactory;

    protected $table = 'properti';

    protected $fillable = [
        'nama_properti',
        'tipe_properti',
        'lokasi_properti',
        'luas_properti',
        'harga_sewa_per_bulan',
        'kondisi',
        'status_sewa',
        'foto_properti',
    ];

    public function transaksi()
    {
        return $this->hasMany(Transaksi::class, 'properti_id');
    }
}
