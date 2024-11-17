<?php

namespace App\Http\Controllers;

use App\Models\Music;
use App\Models\Penyanyi;
use Illuminate\Http\Request;

class ControllerMusic extends Controller
{
    public function index()
    {
        $penyanyi = Penyanyi::with('relasi')->get();
        return view('home', compact('penyanyi'));
    }
    //
}
