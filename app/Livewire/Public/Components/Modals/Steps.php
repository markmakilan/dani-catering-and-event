<?php

namespace App\Livewire\Public\Components\Modals;

use Livewire\Component;
use Livewire\Attributes\On; 

use App\Models\Package;

class Steps extends Component
{
    public $modal_id;

    public $package = [];
    public $addons = [];
    public $customize = [];
    public $reservation = [];
    public $payment = [];

    public function test() {
        dd($this);
    }

    public function increment($type, $keys) {
        $key = explode('.', $keys);
        $this->$type[$key[0]][$key[1]][$key[2]]++;
        $this->$type[$key[0]][$key[1]]['amount'] = $this->$type[$key[0]][$key[1]][$key[2]] * $this->$type[$key[0]][$key[1]]['price'];
    }

    public function decrement($type, $keys) {
        $key = explode('.', $keys);
        $this->$type[$key[0]][$key[1]][$key[2]] != 0 ? $this->$type[$key[0]][$key[1]][$key[2]]-- : 0;
        $this->$type[$key[0]][$key[1]]['amount'] = $this->$type[$key[0]][$key[1]][$key[2]] * $this->$type[$key[0]][$key[1]]['price'];
    }
    
    #[On('selected-package')]
    public function data(Package $package) 
    {
        $this->package = $package;

        foreach ($package['addons'] as $type => $addon) {
            $this->addons[$type] = [];

            foreach ($addon as $key => $value) {
                $this->addons[$type][$key] = [
                    'name' => $value->name,
                    'price' => $value->price,
                    'quantity' => 0,
                    'amount' => 0
                ];
            }
        }

        foreach ($package['customize'] as $type => $customize) {
            $this->customize[$type] = [];

            foreach ($addon as $key => $value) {
                $this->customize[$type][$key] = [
                    'name' => $value->name,
                    'price' => $value->price,
                    'quantity' => 0,
                    'amount' => 0
                ];
            }
        }
    }
    
    public function render()
    {
        return view('livewire.public.components.modals.steps');
    }
}
