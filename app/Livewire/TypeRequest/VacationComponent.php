<?php

namespace App\Livewire\TypeRequest;

use Livewire\Component;
use App\Models\MedicalLeaveType;
use App\Services\VacationService;

class VacationComponent extends Component
{
    public $type, $periodName, $typeLicense, $observation, $effectiveDate, $endDate, $day, $typeDay;

    protected $rules = [
        'periodName' => ['required'],
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

        $message = (new VacationService())->run($this->all())
            ? ['success' => 'Solicitud creada con éxito.']
            : ['error' => 'Ocurrió un error al crear la solicitud.'];

        return $redirect->with($message);
    }

    public function render()
    {
        $medicalLeaveTypes = MedicalLeaveType::get();
        return view('livewire.type-request.vacation-component', compact('medicalLeaveTypes'));
    }
}
