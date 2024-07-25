<?php

namespace App\Livewire\Pages\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\ValidationException;

class Login extends Component
{
    public $email, $password;

    protected $rules = [
        'email' => 'required|email',
        'password' => 'required',
    ];

    protected $messages = [
        'email.required' => 'Email harus diisi',
        'email.email' => 'Masukan email yang valid',
        'password.required' => 'Password harus diisi',
    ];

    public function login()
    {

        $this->validate();

        if (Auth::attempt(['email' => $this->email, 'password' => $this->password])) {
            Session::regenerate();
            return redirect()->intended('dashboard');
        }

        throw ValidationException::withMessages([
            'email' => ['Email atau password salah.'],
        ]);
    }

    public function render()
    {
        return view('livewire.pages.auth.login')->layout('layouts.auth.login');
    }
}
