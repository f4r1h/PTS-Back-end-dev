<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Operator extends Model
{
    use HasFactory;

    protected $table = 'operator';

    protected $fillable = [
        'nama_operator',
        'no_hp',
        'alamat',
        'status_operator',
        'penanggungjawab',
        'alat_berat_id',
    ];

    public function alat_berat()
    {
        return $this->belongsTo(Alat_berat::class, 'alat_berat_id');
    }
}
