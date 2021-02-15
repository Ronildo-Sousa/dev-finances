<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Dashboard extends Component
{

    public $message = '';
    public function save()
    {
        $this->message = 'teste';
    }
    public function render()
    {
        return view('livewire.dashboard');
    }
}
