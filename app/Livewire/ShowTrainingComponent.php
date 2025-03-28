<?php

namespace App\Livewire;

use Livewire\Component;

class ShowTrainingComponent extends Component
{
    public $data;

    protected $listeners = ['show' => 'show'];

    public function show($data)
    {
        $this->data = $data;
    }

    public function close()
    {
        $this->data = [];
    }

    public function render()
    {
        $courseDays = str_split(get_array_value($this->data, 'course.DIAS'));

        // Modificar el array para que comience desde el índice 1
        $courseDays = array_combine(range(1, count($courseDays)), $courseDays);

        return view('livewire.show-training-component', compact('courseDays'));
    }
}
