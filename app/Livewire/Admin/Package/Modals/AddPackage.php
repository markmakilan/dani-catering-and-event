<?php

namespace App\Livewire\Admin\Package\Modals;

use Livewire\Component;

use App\Models\Package;
use App\Models\Service;

class AddPackage extends Component
{
    public $modal;
    public $name;
    public $service_id;
    public $no_of_pax;
    public $inclusions;
    public $services = [];

    public function mount() {
        $this->services = $this->services()->get();
    }

    public function save() {
        Package::create([
            'name' => $this->name,
            'service_id' => $this->service_id,
            'no_of_pax' => $this->no_of_pax,
            'inclusions' => $this->inclusions,
            'status' => true
        ]);

        $this->js('alert("Package has been successfully added.")');

        return redirect()->route('packages');
    }

    public function services() {
        return Service::where('status', true);
    }

    public function render()
    {
        return view('livewire.admin.package.modals.add-package');
    }
}
