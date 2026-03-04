<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class operator extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_operator',
        'alamat',
        'no_hp',
    ];
}
