<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Poli extends Model
{
    use HasFactory;

    protected $table = 'polis';

    protected $guarded = [];

    public function berobat()
    {
        return $this->hasMany(Berobat::class, 'poli_id');
    }

}
