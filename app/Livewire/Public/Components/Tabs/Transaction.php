<?php

namespace App\Livewire\Public\Components\Tabs;

use Livewire\Component;

use App\Models\Transaction AS TransactionModel;

class Transaction extends Component
{
    public $transactions = [];

    public function mount()
    {
        $this->transactions = $this->userTransactions(auth()->user()->id)->get();
    }

    public function transactions()
    {
        return TransactionModel::with(['user', 'package', 'reservation', 'payment'])->latest();
    }
    
    public function userTransactions($user_id)
    {
        return $this->transactions()->where('user_id', $user_id);
    }

    public function render()
    {
        return view('livewire.public.components.tabs.transaction');
    }
}
