<?php

namespace App\Livewire\Public;

use Livewire\Component;

class Packages extends Component
{
    public function render()
    {
        return view('livewire.public.packages')->extends('layouts.public.app');
    }
}
