<?php

use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\ChirpController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;

Route::get('/', [ChirpController::class, 'index']);

Route::middleware('auth')->group(function() {

    Route::post('/chirps', [ChirpController::class, 'store']);
    Route::get('/chirps/{chirp}/edit', [ChirpController::class, 'edit']);
    Route::put('/chirps/{chirp}', [ChirpController::class, 'update']);
    Route::delete('/chirps/{chirp}',[ChirpController::class, 'destroy']);
});

//Route::resource('/chirps', ChirpController::class)
//->only(['store', 'edit', 'update', 'destroy']);

//REGISTER ROUTES
Route::view('/register','auth.register')
->middleware('guest')
->name('register');

Route::post('/register', RegisterController::class)
->middleware('guest');

//LOGOUT
Route::post('/logout', LogoutController::class)
->middleware('auth')
->name('logout');

//LOGIN
Route::view('/login', 'auth.login')
->middleware('guest')
->name('login');

Route::post('/login', LoginController::class)
->middleware('guest')
->name('login');