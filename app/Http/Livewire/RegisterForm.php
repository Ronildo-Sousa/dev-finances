<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class RegisterForm extends Component
{
    use AuthorizesRequests;

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

        $user = [
            'name' => $this->name,
            'email' => $this->email,
            'password' => bcrypt($this->password)
        ];

        $hasUser = User::where('email', '=', $user['email'])->count();

        if ($hasUser) {
            session()->flash('error', 'Erro ao cadastrar, tente outro email!');
            return redirect()->back();
        }

        User::insert($user);
        session()->flash('info', 'Cadastro realizado, Faça login para continuar!');
        return redirect()->to(route('login'));
    }

    public function render()
    {
        return view('livewire.register-form');
    }
}
