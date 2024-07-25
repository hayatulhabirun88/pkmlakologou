<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        return view('layouts.auth.login');
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('login');
    }
}
