<?php

namespace App\Livewire\TypeRequest;

use Livewire\Component;
use App\Models\{TypeAction, MedicalLeaveType};
use App\Services\LicenseService;

class LicenseComponent extends Component
{
    public $type, $typeAction, $typeLicense, $observation, $effectiveDate, $endDate, $day, $typeDay;

    protected $rules = [
        'typeAction' => ['required'],
        'typeLicense' => 'required',
        'observation' => ['nullable', 'string'],
        'effectiveDate' => ['required'],
        'endDate' => ['required'],
        'day' => ['required'],
        'typeDay' => ['required']
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function updatedDay($value)
    {
        $this->endDate = add_days_to_date($this->effectiveDate, $value);
    }

    public function updatedEffectiveDate($value)
    {
        $this->endDate = add_days_to_date($value, $this->day);
    }

    public function submit()
    {
        $this->validate();

        $redirect = redirect()->route('requests.create');

        $message = (new LicenseService())->run($this->all())
            ? ['success' => 'Solicitud creada con éxito.']
            : ['error' => 'Ocurrió un error al crear la solicitud.'];

        return $redirect->with($message);
    }

    public function render()
    {
        $actions = TypeAction::where('CODUNO', $this->type)->get();
        $medicalLeaveTypes = MedicalLeaveType::get();
        return view('livewire.type-request.license-component', compact('actions', 'medicalLeaveTypes'));
    }
}
