<?php

namespace App\Livewire\Public;

use Livewire\Component;

use App\Models\Package;

class Packages extends Component
{
    public $id;

    public $packages = [];

    public function mount($service_id) 
    {
        $this->packages = $this->packages($service_id)->get();
    }

    public function updatedId($value)
    {
        $this->dispatch('selected-package', package: $value);
    }

    public function packages($service_id) {
        return Package::where('service_id', $service_id);
    }

    public function render()
    {
        return view('livewire.public.packages')->extends('layouts.public.app');
    }
}
