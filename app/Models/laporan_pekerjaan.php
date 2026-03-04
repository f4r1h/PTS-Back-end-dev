<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class laporan_pekerjaan extends Model
{
    use HasFactory;

    protected $fillable = [
        'tanggal_laporan',
        'catatan_kondisi',
        'foto_laporan',
    ];
}
