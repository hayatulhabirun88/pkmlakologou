<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            // Redirect to dashboard if authenticated
            return redirect()->route('dashboard');
        }
        return view('layouts.auth.login');
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('login');
    }
}
