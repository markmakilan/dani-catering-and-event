<?php

namespace App\Livewire\Admin\Dashboard\Modals;

use Livewire\Component;

class DeletePackage extends Component
{
    public $modal;
    
    public function render()
    {
        return view('livewire.admin.dashboard.modals.delete-package');
    }
}
