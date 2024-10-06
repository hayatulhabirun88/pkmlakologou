<?php

namespace App\Livewire\Mobile\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class LoginIndex extends Component
{
    public $email;
    public $password;

    protected $rules = [
        'email' => 'required|email',
        'password' => 'required|min:6',
    ];

    protected $messages = [
        'email.required' => 'Email harus diisi.',
        'email.email' => 'Format email tidak valid.',
        'password.required' => 'Kata sandi harus diisi.',
        'password.min' => 'Kata sandi harus minimal 6 karakter.',
    ];

    public function login()
    {
        $this->validate();

        if (Auth::attempt(['email' => $this->email, 'password' => $this->password])) {
            session()->regenerate();
            return redirect()->intended('/apps/dashboard');
        }

        session()->flash('error', 'Email atau kata sandi salah.');
    }
    public function render()
    {
        return view('livewire.mobile.auth.login-index');
    }
}
