<?php

namespace App\Livewire\Public;

use Livewire\Component;
use Livewire\Attributes\Rule;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\Models\User;

class Register extends Component
{
    #[Rule('required|min:2|max:50')]
    public $name;

    #[Rule('required|email|unique:users,email|max:50')]
    public $email;

    #[Rule('required|min:6|max:50')]
    public $password;

    public function register() {
        if ($this->validate()) {
            $user = User::create([
                'name' => $this->name,
                'email' => $this->email,
                'password' => Hash::make($this->password),
                'role' => 'client'
            ]);

            Auth::login($user);

            return $this->redirect('/', navigate: true);
        }
    }

    public function render()
    {
        return view('livewire.public.register')->extends('layouts.public.blank');
    }
}
