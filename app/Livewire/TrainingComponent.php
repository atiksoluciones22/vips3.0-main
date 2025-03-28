<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\WorkerCourse;

class TrainingComponent extends Component
{
    public function show($data)
    {
        $this->dispatch('show', $data);
    }

    public function render()
    {
        $user = auth()->user();

        $workerCourses = WorkerCourse::where('TRAB', $user->COD)->whereHas('course')->with('course.instructor')->with('course.classroom')->get()->toArray();

        return view('livewire.training-component', compact('workerCourses'));
    }
}
