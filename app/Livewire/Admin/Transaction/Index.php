<?php

namespace App\Livewire\Admin\Transaction;

use Livewire\Component;

use App\Models\Transaction;

class Index extends Component
{
    public $transactions = [];

    public function mount()
    {
        $this->transactions = $this->transactions()->get();
    }

    public function refresh()
    {
        $this->transactions = $this->transactions()->get();
    }

    public function transactions()
    {
        return Transaction::with(['user', 'reservation'])->latest();
    }
    
    public function render()
    {
        return view('livewire.admin.transaction.index')->extends('layouts.admin.app');
    }
}
