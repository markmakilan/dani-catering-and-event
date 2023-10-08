<?php

namespace App\Livewire\Public;

use Livewire\Component;

class Index extends Component
{
    public $current = 0;

    public function render()
    {
        return view('livewire.public.index')->extends('layouts.public.app');
    }
}
