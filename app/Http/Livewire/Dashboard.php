<?php

namespace App\Http\Livewire;

use App\Models\Finance;
use Illuminate\Support\Facades\Auth as FacadeAuth;
use Livewire\Component;

class Dashboard extends Component
{
    public $description;
    public $amount;
    public $date;
    public $finances;
    public $newTransaction = false;

    protected $rules = [
        'description' => 'required',
        'amount' => 'required',
        'date' => 'required'
    ];

    public function mount()
    {
        $this->finances = Finance::all();
    }

    public function createTransaction()
    {
        $this->validate();
        dd('ok');
    }

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
