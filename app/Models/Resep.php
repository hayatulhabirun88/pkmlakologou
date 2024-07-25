<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resep extends Model
{
    use HasFactory;

    protected $table = 'reseps';

    protected $guarded = [];

    public function obat()
    {
        return $this->belongsTo(Obat::class);
    }

    public function berobat()
    {
        return $this->belongsTo(Berobat::class);
    }
}
