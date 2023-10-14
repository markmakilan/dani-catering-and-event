<?php

namespace App\Livewire\Admin\Package;

use Livewire\Component;

use App\Models\Package;

class Index extends Component
{
    public $edit_package_modal = false;
    public $delete_package_modal = false;

    public $packages = [];

    public function mount() {
        $this->packages = $this->packages();
    }

    public function toggleEditPackageModal($id) {
        $this->edit_package_modal = !$this->edit_package_modal;

        $this->dispatch('selected-package', package: $id);
    }

    public function toggleDeletePackageModal($id) {
        $this->delete_package_modal = !$this->delete_package_modal;

        $this->dispatch('selected-package', package: $id);
    }
    
    public function packages() {
        return Package::all();
    }

    public function render()
    {
        return view('livewire.admin.package.index')->extends('layouts.admin.app');
    }
}
