<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ExtendModel extends Model
{
    use HasFactory;

    protected $connection = 'sqlsrv';
}
