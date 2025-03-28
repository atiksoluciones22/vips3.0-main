<?php

namespace App\Livewire\TypeRequest;

use Livewire\Component;
use App\Services\AbsenceService;
use App\Models\{Cause, MedicalLeaveType};

class AbsenceComponent extends Component
{
    public $type, $cause, $typeLicense, $observation, $effectiveDate, $endDate, $day, $typeDay;

    protected $rules = [
        'cause' => ['required'],
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

        $message = (new AbsenceService())->run($this->all())
            ? ['success' => 'Solicitud creada con éxito.']
            : ['error' => 'Ocurrió un error al crear la solicitud.'];

        return $redirect->with($message);
    }

    public function render()
    {
        $causes = Cause::where('TIPO', 2)->get();
        $medicalLeaveTypes = MedicalLeaveType::get();
        return view('livewire.type-request.absence-component', compact('causes', 'medicalLeaveTypes'));
    }
}
