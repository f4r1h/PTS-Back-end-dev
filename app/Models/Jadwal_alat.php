<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class jadwal_alat extends Model
{
    use HasFactory;

    protected $fillable = [
        'tanggal_mulai',
        'tanggal_selesai',
    ];
}
