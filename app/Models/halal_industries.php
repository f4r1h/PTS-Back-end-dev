<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class halal_industries extends Model
{
    use HasFactory;

    protected $fillable = [
        'admin',
        'alat_berat',
        'jadwal_alat',
        'transaksi',
        'properti',
        'pelanggan',
        'laporan_pekerjaan',
        'operator',
    ];
}
