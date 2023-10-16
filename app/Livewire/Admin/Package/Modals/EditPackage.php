<?php

namespace App\Livewire\Admin\Package\Modals;

use Livewire\{Component, WithFileUploads};
use Livewire\Attributes\{On, Rule}; 

use App\Models\{Package, Service};

class EditPackage extends Component
{
    use WithFileUploads;

    public $modal;

    public $file;
    #[Rule('required|max:50')]
    public $name;
    #[Rule('required|numeric|gt:0')]
    public $price;
    #[Rule('required|exists:services,id')]
    public $service_id;
    #[Rule('required|numeric|gt:0')]
    public $no_of_pax;
    public $inclusions;
    public $status;

    public $flowers = [];
    public $chairs = [];
    public $tables = [];

    public $package = [];
    public $services = [];
    public $addons = [];
    public $customize = [];

    public function mount() 
    {
        $this->services = $this->services()->get();
    }

    public function update() 
    {
        if ($this->validate()) {
            $this->package->update([
                'name' => $this->name,
                'price' => $this->price,
                'service_id' => $this->service_id,
                'no_of_pax' => $this->no_of_pax,
                'inclusions' => $this->inclusions,
                'addons' => (object) $this->addons,
                'customize' => (object) $this->customize,
                'status' => $this->status
            ]);

            if ($this->file && $this->validate(['file' => 'file|mimes:jpg,jpeg,png|max:5120'])) {
                $this->package->addMedia($this->file)->toMediaCollection('packages');
            }
    
            return redirect()->route('packages');
        }
    }

    #[On('selected-package')]
    public function data(Package $package) 
    {
        $this->package = $package;
        $this->name = $package->name;
        $this->price = $package->price;
        $this->service_id = $package->service_id;
        $this->no_of_pax = $package->no_of_pax;
        $this->inclusions = $package->inclusions;
        $this->addons = json_decode(json_encode($package->addons), true) ?? [];
        $this->customize = json_decode(json_encode($package->customize), true) ?? [];
        $this->status = $package->status;
        
        $this->flowers = [
            'addons' => data_get($package->addons, 'flowers') ? true : false,
            'customize' => data_get($package->customize, 'flowers') ? true : false,
        ];

        $this->chairs = [
            'addons' => data_get($package->addons, 'chairs') ? true : false,
            'customize' => data_get($package->customize, 'chairs') ? true : false,
        ];

        $this->tables = [
            'addons' => data_get($package->addons, 'tables') ? true : false,
            'customize' => data_get($package->customize, 'tables') ? true : false,
        ];
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
        return view('livewire.admin.package.modals.edit-package');
    }
}
