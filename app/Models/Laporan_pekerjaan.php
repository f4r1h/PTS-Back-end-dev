<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Laporan_pekerjaan extends Model
{
    use HasFactory;

    protected $table = 'laporan_pekerjaan';

    protected $fillable = [
        'tanggal_laporan',
        'jam_kerja_alat',
        'bahan_bakar_terpakai',
        'catatan_kondisi',
        'foto_laporan',
        'jadwal_alat_id',
        'operator_id',
    ];

    public function jadwal_alat()
    {
        return $this->belongsTo(Jadwal_alat::class, 'jadwal_alat_id');
    }

    public function operator()
    {
        return $this->belongsTo(Operator::class, 'operator_id');
    }
}
