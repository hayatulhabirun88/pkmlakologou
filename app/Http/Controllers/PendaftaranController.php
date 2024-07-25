<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PendaftaranController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('pendaftaran');
    }

    public function lihat_pendaftaran()
    {
        return view('lihat_pendaftaran');
    }
}
