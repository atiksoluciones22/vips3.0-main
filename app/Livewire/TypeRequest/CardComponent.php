<?php

namespace App\Livewire\TypeRequest;

use Livewire\Component;
use App\Services\CardService;

class CardComponent extends Component
{
    public $type, $observation;

    protected $rules = [
        'observation' => ['required', 'string']
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function submit()
    {
        $this->validate();

        $redirect = redirect()->route('requests.create');

        $message = (new CardService())->run($this->all())
            ? ['success' => 'Solicitud creada con éxito.']
            : ['error' => 'Ocurrió un error al crear la solicitud.'];

        return $redirect->with($message);
    }

    public function render()
    {
        return view('livewire.type-request.card-component');
    }
}
