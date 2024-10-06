<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ObatMController extends Controller
{
    public function obat_masuk()
    {
        return view('mobile.obat.obat_masuk');
    }
}
