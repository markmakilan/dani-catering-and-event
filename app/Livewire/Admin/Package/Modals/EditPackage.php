<?php

namespace App\Livewire\Admin\Package\Modals;

use Livewire\Component;
use Livewire\Attributes\On; 

use App\Models\{Package, Service};

class EditPackage extends Component
{
    public $modal;

    public $name;
    public $service_id;
    public $no_of_pax;
    public $inclusions;
    public $status;
    public $flowers = false;
    public $chairs = false;
    public $tables = false;

    public $package = [];
    public $services = [];
    public $addons = [];

    public function mount() 
    {
        $this->services = $this->services()->get();
    }

    public function update() 
    {
        $this->package->update([
            'name' => $this->name,
            'service_id' => $this->service_id,
            'no_of_pax' => $this->no_of_pax,
            'inclusions' => $this->inclusions,
            'addons' => (object) $this->addons,
            'status' => $this->status
        ]);

        return redirect()->route('packages');
    }

    #[On('selected-package')]
    public function data(Package $package) 
    {
        $this->package = $package;
        $this->name = $package->name;
        $this->service_id = $package->service_id;
        $this->no_of_pax = $package->no_of_pax;
        $this->inclusions = $package->inclusions;
        $this->addons = json_decode(json_encode($package->addons), true);
        $this->status = $package->status;
        $this->flowers = data_get($package->addons, 'flowers') ? true : false;
        $this->chairs = data_get($package->addons, 'chairs') ? true : false;
        $this->tables = data_get($package->addons, 'tables') ? true : false;
    }

    public function updated($key, $value) 
    {
        switch ($key) {
            case 'flowers':
            case 'chairs':
            case 'tables':
                if ($value) {
                    $this->addons[$key][] = [
                        'name' => '',
                        'price' => 0
                    ];
                }
                else {
                    unset($this->addons[$key]);
                }
                break;
        }
    }

    public function addAddonItemType($type) 
    {
        $this->addons[$type][] = [
            'name' => '',
            'price' => 0
        ];
    }

    public function removeAddonItemType($type, $key) 
    {
        unset($this->addons[$type][$key]);

        if (count($this->addons[$type]) == 0) {
            unset($this->addons[$key]);

            $this->reset($type);
        }
    }

    public function services() 
    {
        return Service::where('status', true);
    }

    public function render()
    {
        return view('livewire.admin.package.modals.edit-package');
    }
}
