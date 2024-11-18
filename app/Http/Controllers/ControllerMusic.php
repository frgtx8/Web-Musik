<?php

namespace App\Http\Controllers;

use App\Models\Music;
use App\Models\Penyanyi;
use App\Models\User;
use Illuminate\Http\Request;

class ControllerMusic extends Controller
{
    public function index()
    {
        $penyanyi = Penyanyi::with('relasi')->get();
        return view('home', compact('penyanyi'));
    }
    public function login()
    {
        return view('login');
    }
    public function pencarian()
    {
        return view('pencarian');
    }
    public function register()
    {
        return view('register');
    }
    public function storeRegister(Request $request)
    {
        $data = $request->validate(['name' => 'string', 'email' => 'email', 'password' => 'min:2']);
        User::create($data);
        return redirect('login');
    }
}

