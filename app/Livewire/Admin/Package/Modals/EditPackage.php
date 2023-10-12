<?php

namespace App\Livewire\Admin\Package\Modals;

use Livewire\Component;

use App\Models\Package;
use App\Models\Service;

class EditPackage extends Component
{
    public $modal;
    public $id;
    public $name;
    public $service_id;
    public $no_of_pax;
    public $inclusions;
    public $status;
    public $package = [];
    public $packages = [];
    public $services = [];

    public function mount() {
        if ($this->package) {
            $this->data($this->package);
        }
        
        $this->packages = $this->packages();
        $this->services = $this->services()->get();
    }

    public function updatedId(Package $package) {
        $this->data($package);
    }

    public function update() {
        $this->package->update([
            'name' => $this->name,
            'service_id' => $this->service_id,
            'no_of_pax' => $this->no_of_pax,
            'inclusions' => $this->inclusions,
            'status' => $this->status
        ]);

        $this->js('alert("Package has been successfully updated.")');

        return redirect()->route('packages');
    }

    public function data($package) {
        $this->id = $package->id;
        $this->name = $package->name;
        $this->service_id = $package->service_id;
        $this->no_of_pax = $package->no_of_pax;
        $this->inclusions = $package->inclusions;
        $this->status = $package->status;
    }

    public function packages() {
        return Package::all();
    }

    public function services() {
        return Service::where('status', true);
    }

    public function render()
    {
        return view('livewire.admin.package.modals.edit-package');
    }
}
