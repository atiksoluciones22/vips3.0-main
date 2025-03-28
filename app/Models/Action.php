<?php

namespace App\Models;

use App\Models\ExtendModel;

class Action extends ExtendModel
{
    protected $table = "051";

    public function user() {
        return $this->belongsTo(User::class, 'COD', 'COD');
    }

    public function type_action() {
        return $this->belongsTo(TypeAction::class, 'ACCION', 'COD');
    }

    public function access_to_action() {
        return $this->belongsTo(AccessToAction::class, 'ACCION', 'ACCION');
    }
}
