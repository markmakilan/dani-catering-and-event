<?php

namespace App\Livewire\Admin\Service;

use Livewire\Component;

use App\Models\Service;


class Index extends Component
{
    public $edit_service_modal = false;

    #[Reactive] 
    public $service = [];

    public $services = [];

    public function mount() {
        $this->services = $this->services();
    }

    public function toggleEditServiceModal($id) {
        $this->edit_service_modal = !$this->edit_service_modal;
        $this->service = Service::find($id);
    }
    
    public function services() {
        return Service::all();
    }

    public function render()
    {
        return view('livewire.admin.service.index')->extends('layouts.admin.app');
    }
}
