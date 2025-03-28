<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SettingController extends Controller
{
    public function index()
    {
        return view('setting.index');
    }

    public function update(Request $request)
    {
        $request->validate([
            'password' => 'required|string|min:8|confirmed',
        ]);

        auth()->user()->update(['CONWEB' => Hash::make($request->password)]);

        return redirect()->route('dashboard')->with('success', 'Contraseña actualizada correctamente.');
    }
}
