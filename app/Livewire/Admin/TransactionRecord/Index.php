<?php

namespace App\Livewire\Admin\TransactionRecord;

use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.admin.transaction-record.index')->extends('layouts.admin.app');
    }
}
