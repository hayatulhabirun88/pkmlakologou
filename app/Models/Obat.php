<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Obat extends Model
{
    use HasFactory;

    protected $table = 'obats';
    protected $guarded = [];

    public function lokasi_obat()
    {
        return $this->belongsTo(LokasiObat::class);
    }
}
