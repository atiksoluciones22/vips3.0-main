<?php

namespace App\Http\Controllers;

class UserController extends Controller
{
    public function information()
    {
        return view('user.information');
    }
}
