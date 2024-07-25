<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dokter extends Model
{
    use HasFactory;

    protected $table = 'dokters';

    protected $guarded = [];

    public function berobat()
    {
        return $this->hasMany(Berobat::class, 'dokter_id');
    }
}
