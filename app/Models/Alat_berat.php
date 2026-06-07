<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Alat_berat extends Model
{
    use HasFactory;

    protected $table = 'alat_berat';

    protected $fillable = [
        'nama_alat',
        'tipe_alat',
        'kode_unit',
        'spesifikasi',
        'harga_sewa_per_hari',
        'kondisi',
        'status_sewa',
        'lokasi_sekarang',
        'foto_alat',
    ];

    public function jadwal_alat()
    {
        return $this->hasMany(Jadwal_alat::class, 'alat_berat_id');
    }
}
