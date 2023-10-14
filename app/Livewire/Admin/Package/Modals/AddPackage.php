<?php

namespace App\Livewire\Admin\Package\Modals;

use Livewire\Component;

use Illuminate\Support\Str;

use App\Models\{Package, Service};

class AddPackage extends Component
{
    public $modal;
    
    public $name;
    public $service_id;
    public $no_of_pax;
    public $inclusions;
    public $flowers = false;
    public $chairs = false;
    public $tables = false;

    public $services = [];
    public $addons = [];

    public function mount() 
    {
        $this->services = $this->services()->get();
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

    public function save() 
    {
        Package::create([
            'name' => $this->name,
            'service_id' => $this->service_id,
            'no_of_pax' => $this->no_of_pax,
            'inclusions' => $this->inclusions,
            'addons' => (object) $this->addons,
            'status' => true
        ]);

        return redirect()->route('packages');
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
        return view('livewire.admin.package.modals.add-package');
    }
}
