<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ObatMasuk extends Model
{
    use HasFactory;

    protected $table = 'obat_masuks';

    protected $guarded = [];

    public function obat()
    {
        return $this->belongsTo(Obat::class);
    }
}
