<?php

namespace App\Livewire\Admin\Service\Modals;

use Livewire\Component;

class EditService extends Component
{
    public $modal;
    public $name;
    public $status;

    public $service = [];

    public function mount() {
        if ($this->service) {
            $this->name = $this->service->name;
            $this->status = $this->service->status;
        }
    }

    public function update() {
        $this->service->update([
            'name' => $this->name,
            'status' => $this->status,
        ]);

        $this->js('alert("Service has been successfully updated.")');

        return redirect()->route('services');
    }

    public function render()
    {
        return view('livewire.admin.service.modals.edit-service');
    }
}
