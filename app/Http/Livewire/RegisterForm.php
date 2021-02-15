<?php

namespace App\Http\Livewire;

use Livewire\Component;

class RegisterForm extends Component
{
    public $name;
    public $email;
    public $password;

    protected $rules = [
        'name' => 'required|min:4',
        'email' => 'required|email',
        'password' => 'required|min:4'
    ];

    public function register()
    {
        $this->validate();

        dd('ok');
    }
    public function render()
    {
        return view('livewire.register-form');
    }
}
