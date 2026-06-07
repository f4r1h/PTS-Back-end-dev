<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Jadwal_alat extends Model
{
    use HasFactory;

    protected $table = 'jadwal_alat';

    protected $fillable = [
        'tanggal_mulai',
        'tanggal_selesai',
        'status_jadwal',
        'alat_berat_id',
        'transaksi_id',
    ];

    public function alat_berat()
    {
        return $this->belongsTo(Alat_berat::class, 'alat_berat_id');
    }

    public function transaksi()
    {
        return $this->belongsTo(Transaksi::class, 'transaksi_id');
    }

    public function laporan_pekerjaan()
    {
        return $this->hasMany(Laporan_pekerjaan::class, 'jadwal_alat_id');
    }
}
