<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pelanggan extends Model
{
    use HasFactory;

    protected $table = 'pelanggan';

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

    public function transaksi()
    {
        return $this->hasMany(Transaksi::class, 'pelanggan_id');
    }
}
