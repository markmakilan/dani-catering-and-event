<?php

namespace App\Livewire\Public\Components\Modals;

use Livewire\{Component, WithFileUploads};
use Livewire\Attributes\On; 

use Illuminate\Support\Facades\{DB, Auth};

use App\Models\{Package, Transaction, Reservation, Payment, Bank};

class Steps extends Component
{
    use WithFileUploads;

    public $modal_id;

    public $file;
    
    public $steps = 'confirmation';

    public $package = [];
    public $addons = [];
    public $customize = [];
    public $reservation = [];
    public $payment = [];
    public $banks = [];

    public function  mount() 
    {
        $this->banks = $this->banks()->get();    
    }

    public function proceed($value) 
    {
        switch ($value) {
            case 'dp':
                $this->validate([
                    'reservation.name' => 'required',
                    'reservation.contact' => 'required',
                    'reservation.date_of_use' => 'required|date',
                    'reservation.location' => 'required',
                    'reservation.email' => 'required|email',
                ]);
                break;

            case 'confirm':
                $this->validate([
                    'payment.name' => 'required',
                    'payment.amount' => 'required|numeric|gt:0',
                    'payment.ref_no' => 'required',
                    'payment.email' => 'required|email',
                    'file' => 'required|file|mimes:jpg,jpeg,png|max:5120'
                ]);
                break;
            
            default:
                # code...
                break;
        }

        $this->dispatch('proceed-step', step: $value);   
    }

    public function submit() 
    {
        try {
            DB::transaction(function () {
                $transaction = Transaction::create([
                    'user_id' => Auth::user()->id,
                    'package_id' => $this->package->id,
                    'package_amount' => $this->package->price,
                    'addons_total_amount'=> collect(data_get($this->addons, '*.*'))->sum('amount'),
                    'customize_total_amount' => collect(data_get($this->customize, '*.*'))->sum('amount'),
                    'addons' => (object) $this->addons,
                    'customize' => (object) $this->customize,
                    'remarks' => 'pending'
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

                $transaction->addMedia($this->file)->toMediaCollection('transactions');
    
                $this->js('alert("Your reservation has been submitted.")');

                return redirect()->route('account', ['tab' => 'transactions']);
            });
        } catch (\Throwable $th) {
            $this->js('alert("We\'re unable to process your reservation at this time.")');
        }
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

    public function banks() {
        return Bank::where('status', true);
    }
    
    public function render()
    {
        return view('livewire.public.components.modals.steps');
    }
}
