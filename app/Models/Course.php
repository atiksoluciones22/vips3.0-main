<?php

namespace App\Models;

use App\Models\ExtendModel;

class Course extends ExtendModel
{
    protected $table = '036';

    public function instructor() {
        return $this->belongsTo(Instructor::class, 'COD', 'INST');
    }

    public function classroom() {
        return $this->belongsTo(Classroom::class, 'AULA', 'COD');
    }
}
