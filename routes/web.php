<?php

use App\Http\Controllers\ControllerMusic;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('');
// });

// Route::get('/', function () {
//     return view('home');
// });

Route::get('/', [ControllerMusic::class, 'index']);
