<?php

namespace App\Livewire\Admin\ItemType\Modals;

use Livewire\Component;
use Livewire\Attributes\Rule;

use App\Models\ItemType;

class AddItemType extends Component
{
    public $modal;

    #[Rule('required|unique:services,name|max:50')]
    public $name;

    #[Rule('required')]
    public $type;

    public function save() {
        if ($this->validate()) {
            $service = ItemType::create([
                'name' => $this->name,
                'type' => $this->type
            ]);
    
            return redirect()->route('item-types');
        }
    }

    public function render()
    {
        return view('livewire.admin.item-type.modals.add-item-type');
    }
}
