<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
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

        $credentials = [
            'email' => $this->email,
            'password' => $this->password
        ];

        if (!Auth::attempt($credentials)) {
            session()->flash('error', 'Email ou senha incorretos!');
            return redirect()->back();
        }
        return redirect()->to(route('dashboard'));
    }

    public function render()
    {
        return view('livewire.login-form');
    }
}
