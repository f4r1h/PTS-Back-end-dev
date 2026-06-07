<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RentalApplication extends Model
{
    protected $fillable = [
        'pelanggan_id',
        'alat_berat_id',
        'duration_months',
        'message',
        'status',
    ];

    public function pelanggan()
    {
        return $this->belongsTo(pelanggan::class);
    }

    public function alat_berat()
    {
        return $this->belongsTo(Alat_berat::class);
    }
}
