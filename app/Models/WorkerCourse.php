<?php

namespace App\Models;

use App\Models\ExtendModel;

class WorkerCourse extends ExtendModel
{
    protected $table = '038';

    public function course() {
        return $this->belongsTo(Course::class, 'COD', 'CURSO');
    }
}
