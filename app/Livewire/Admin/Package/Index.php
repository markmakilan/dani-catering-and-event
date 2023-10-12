<?php

namespace App\Livewire\Admin\Package;

use Livewire\Component;

use App\Models\Package;

class Index extends Component
{
    #[Reactive] 
    public $package = [];

    public $edit_package_modal = false;

    public $packages = [];

    public function mount() {
        $this->packages = $this->packages();
    }

    public function toggleEditPackageModal(Package $package) {
        $this->edit_package_modal = !$this->edit_package_modal;
        $this->package = $package;
    }
    
    public function packages() {
        return Package::all();
    }

    public function render()
    {
        return view('livewire.admin.package.index')->extends('layouts.admin.app');
    }
}
