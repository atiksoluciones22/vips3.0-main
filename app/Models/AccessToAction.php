<?php

namespace App\Models;

use App\Models\ExtendModel;

class AccessToAction extends ExtendModel
{
    protected $table = '050';

    public function user() {
        return $this->belongsTo('App\Models\User', 'USUARI', 'COD');
    }
}
