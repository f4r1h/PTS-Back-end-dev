<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class alat_berat extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_alat',
        'kode_alat',
        'kondisi',
        'status_sewa',
        'foto_alat',
    ];
}
