<?php

namespace App\Livewire\Admin\Transaction;

use Livewire\Component;

use App\Models\{Package, Transaction, Reservation, Payment};

class Manage extends Component
{
    public Transaction $transaction;

    public $package;
    public $reservation;
    public $payment;

    public function mount()
    {
        $this->package = $this->transaction->package->with('service')->first();
        $this->reservation = $this->transaction->reservation;
        $this->payment = $this->transaction->payment;
    }

    public function updateRemarks($value) {
        if (in_array($value, ['accepted', 'declined', 'cancelled'])) {
            $this->transaction->update([
                'remarks' => $value
            ]);
        }

        return redirect()->route('transactions.manage', ['transaction' => $this->transaction->id]);
    }

    public function render()
    {
        return view('livewire.admin.transaction.manage')->extends('layouts.admin.app');
    }
}
