<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class properti extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_properti',
        'tipe_properti',
        'kondisi',
    ];
}
