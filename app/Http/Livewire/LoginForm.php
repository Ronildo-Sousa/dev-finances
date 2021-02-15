<?php

namespace App\Http\Livewire;

use Livewire\Component;

class LoginForm extends Component
{
    public $email;
    public $password;

    protected $rules = [
        'email' => 'required|email',
        'password' => 'required|min:4'
    ];

    public function login()
    {
        $this->validate();

        dd('ok');
    }

    public function render()
    {
        return view('livewire.login-form');
    }
}
