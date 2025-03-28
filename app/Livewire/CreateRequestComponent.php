<?php

namespace App\Livewire;

use Livewire\Component;

class CreateRequestComponent extends Component
{
    public $selectedType = '';

    public function updatedselectedType($value)
    {
        $this->selectedType = $value;
    }

    public function render()
    {
        return view('livewire.create-request-component');
    }
}
