<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ObatMController extends Controller
{
    public function obat_masuk()
    {
        return view('mobile.obat.obat_masuk');
    }

    public function transaksi()
    {
        return view('mobile.obat.transaksi-obat-masuk');
    }

    public function cek_stok()
    {
        return view('mobile.obat.cek_stok');
    }
}
