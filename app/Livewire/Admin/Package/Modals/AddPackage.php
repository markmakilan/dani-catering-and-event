<?php

namespace App\Livewire\Admin\Package\Modals;

use Livewire\Component;

use Illuminate\Support\Str;

use App\Models\{Package, Service};

class AddPackage extends Component
{
    public $modal;
    
    public $name;
    public $price;
    public $service_id;
    public $no_of_pax;
    public $inclusions;

    public $flowers = [];
    public $chairs = [];
    public $tables = [];

    public $services = [];
    public $addons = [];
    public $customize = [];

    public function mount() 
    {
        $this->services = $this->services()->get();
    }

    public function updated($key, $value) 
    {
        $keys = explode('.', $key);

        switch ($keys[0]) {
            case 'flowers':
            case 'chairs':
            case 'tables':
                if ($value) {
                    
                    if ($keys[1] == 'addons') {
                        $this->addons[$keys[0]][] = [
                            'name' => '',
                            'price' => 0
                        ];
                    }
                    else {
                        $this->customize[$keys[0]][] = [
                            'name' => '',
                            'price' => 0
                        ];
                    }
                }
                else {
                    if ($keys[1] == 'addons') {
                        unset($this->addons[$keys[0]]);
                    }
                    else {
                        unset($this->customize[$keys[0]]);
                    }
                }
                break;
        }
    }

    public function save() 
    {   
        Package::create([
            'name' => $this->name,
            'price' => $this->price,
            'service_id' => $this->service_id,
            'no_of_pax' => $this->no_of_pax,
            'inclusions' => $this->inclusions,
            'addons' => (object) $this->addons,
            'customize' => (object) $this->customize
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
            unset($this->addons[$type]);

            $this->$type['addons'] = false;
        }
    }

    public function addCustomizeItemType($type) 
    {
        $this->customize[$type][] = [
            'name' => '',
            'price' => 0
        ];
    }

    public function removeCustomizeItemType($type, $key) 
    {
        unset($this->customize[$type][$key]);

        if (count($this->customize[$type]) == 0) {
            unset($this->customize[$type]);

            $this->$type['customize'] = false;
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
