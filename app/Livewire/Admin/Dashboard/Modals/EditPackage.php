<?php

namespace App\Livewire\Admin\Dashboard\Modals;

use Livewire\Component;

class EditPackage extends Component
{
    public $modal;
    
    public function render()
    {
        return view('livewire.admin.dashboard.modals.edit-package');
    }
}
