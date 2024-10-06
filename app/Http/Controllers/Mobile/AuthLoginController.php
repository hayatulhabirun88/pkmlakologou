<?php

namespace App\Http\Controllers\Mobile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthLoginController extends Controller
{

    public function login()
    {
        return view('mobile.auth.login');
    }


}
