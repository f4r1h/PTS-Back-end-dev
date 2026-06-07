<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class pelanggan extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'jenis',
        'email',
        'nomer_telpon',
        'nomer_identitas',
        'nama_perusahaan',
        'penanggungjawab',
        'alamat',
        'tanggal_daftar',
    ];
}
