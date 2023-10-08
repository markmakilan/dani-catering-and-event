<?php

namespace App\Livewire\Public\Components\Modals;

use Livewire\Component;

class Steps extends Component
{
    public $modal_id;
    
    public function render()
    {
        return view('livewire.public.components.modals.steps');
    }
}
