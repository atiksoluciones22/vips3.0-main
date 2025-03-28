<?php

namespace App\Http\Controllers;

class RequestController extends Controller
{
    public function index()
    {
        return view('request.index');
    }

    public function create()
    {
        get_toast();
        return view('request.create');
    }
}
