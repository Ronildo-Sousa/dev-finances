<?php

namespace App\Http\Livewire;

use App\Models\Finance;
use Illuminate\Support\Facades\Auth as FacadeAuth;
use Livewire\Component;
use Livewire\WithPagination;

class Dashboard extends Component
{
    use WithPagination;

    public $description;
    public $amount;
    public $date;
    public $user;

    protected $allFinances;
    public $newTransaction = false;

    public $expenses;
    public $incomes;
    public $total;

    protected $rules = [
        'description' => 'required',
        'amount' => 'required',
        'date' => 'required'
    ];

    public function mount()
    {
        $this->user = FacadeAuth::user();

        $this->allFinances = Finance::all();

        $this->expenses = abs($this->allFinances->where('amount', '<', '0')->sum('amount'));
        $this->incomes = abs($this->allFinances->where('amount', '>', '0')->sum('amount'));
        $this->total = ($this->incomes - $this->expenses);
    }

    public function createTransaction()
    {
        $this->validate();

        Finance::insert([
            'description' => $this->description,
            'amount' => $this->amount,
            'date' => $this->date,
            'user_id' => $this->user->id
        ]);

        session()->flash('info', 'Transação criada com sucesso!');
        return redirect()->to(route('dashboard'));
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
        return view('livewire.dashboard', [
            'finances' => $this->finances = Finance::paginate(4)
        ]);
    }
}
