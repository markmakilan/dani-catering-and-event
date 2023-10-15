<?php

namespace App\Livewire\Public\Components\Modals;

use Livewire\Component;
use Livewire\Attributes\On; 

use Illuminate\Support\Facades\DB;

use App\Models\{Package, Transaction, Reservation, Payment};

class Steps extends Component
{
    public $modal_id;

    public $package = [];
    public $addons = [];
    public $customize = [];
    public $reservation = [];
    public $payment = [];

    public function submit() 
    {
        DB::transaction(function () {
            $transaction = Transaction::create([
                'package_id' => $this->package->id,
                'package_amount' => $this->package->price,
                'addons_total_amount'=> collect(data_get($this->addons, '*.*'))->sum('amount'),
                'customize_total_amount' => collect(data_get($this->customize, '*.*'))->sum('amount'),
                'addons' => (object) $this->addons,
                'customize' => (object) $this->customize,
                'remarks' => null
            ]);

            Reservation::create([
                'transaction_id' => $transaction->id,
                'name' => $this->reservation['name'],
                'contact' => $this->reservation['contact'],
                'date_of_use' => $this->reservation['date_of_use'],
                'location' => $this->reservation['location'],
                'email' => $this->reservation['email'],
            ]);

            Payment::create([
                'transaction_id' => $transaction->id,
                'name' => $this->payment['name'],
                'type' => 'down_payment',
                'amount' => $this->payment['amount'],
                'ref_no' => $this->payment['ref_no'],
                'email' => $this->payment['email']
            ]);

            $this->js('alert("Your reservation has been submitted.")');

            return redirect()->route('home');
        });
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
