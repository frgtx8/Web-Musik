<?php

use App\Http\Controllers\ControllerMusic;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('');
// });

// Route::get('/', function () {
//     return view('home');
// });

Route::get('/', [ControllerMusic::class, 'index'])->name('home');
Route::get('/login', [ControllerMusic::class, 'login']);
Route::get('/pencarian', [ControllerMusic::class, 'pencarian']);
Route::get('/register', [ControllerMusic::class, 'register']);
Route::post('/register', [ControllerMusic::class, 'storeRegister']);
Route::post('/login',[ControllerMusic::class, 'storeLogin'] );
Route::post('/logout',[ControllerMusic::class, 'logout'])->name('logout');
