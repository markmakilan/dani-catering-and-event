<?php

namespace App\Livewire\Admin\Service;

use Livewire\Component;

use App\Models\Service;

class Index extends Component
{
    #[Reactive] 
    public $service = [];

    public $edit_service_modal = false;

    public $services = [];

    public function mount() {
        $this->services = $this->services();
    }

    public function toggleEditServiceModal(Service $service) {
        $this->edit_service_modal = !$this->edit_service_modal;
        $this->service = $service;
    }
    
    public function services() {
        return Service::all();
    }

    public function render()
    {
        return view('livewire.admin.service.index')->extends('layouts.admin.app');
    }
}
