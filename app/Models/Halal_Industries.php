<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Halal_Industries extends Model
{
    use HasFactory;

    protected $table = 'halal_industries';

    protected $fillable = [
        'admin',
        'alat_berat',
        'jadwal_alat',
        'transaksi',
        'properti',
        'pelanggan',
        'laporan_pekerjaan',
        'operator',
        'email',
    ];
}
