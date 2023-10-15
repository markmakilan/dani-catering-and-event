<?php

namespace App\Livewire\Admin\Service\Modals;

use Livewire\Component;

use App\Models\Service;

class AddService extends Component
{
    public $modal;
    public $name;

    public function save() {
        Service::create([
            'name' => $this->name
        ]);

        return redirect()->route('services');
    }

    public function render()
    {
        return view('livewire.admin.service.modals.add-service');
    }
}
