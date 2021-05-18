<?php

namespace App\Http\Livewire\App;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{
    public $credentials = [
        'email' => '',
        'password' => ''
    ];

    protected $rules = [
        'credentials.email' => ['required', 'email'],
        'credentials.password' => ['required'],
    ];

    public function render()
    {
        return view('livewire.app.login');
    }

    public function login()
    {
        $this->validate();

        if (Auth::attempt($this->credentials)) {
            return redirect()->intended(route('front.index'));
        }

        $this->addError('error', 'Wrong email or password');
    }
}
