<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth as FacadeAuth;
use Livewire\Component;

class Dashboard extends Component
{
    public $user;
    public $newTransaction = false;

    public function showModal()
    {
        $this->newTransaction = true;
    }

    public function closeModal()
    {
        $this->newTransaction = false;
    }

    public function logout()
    {
        FacadeAuth::logout();
        return redirect()->to(route('login'));
    }

    public function render()
    {
        return view('livewire.dashboard');
    }
}
