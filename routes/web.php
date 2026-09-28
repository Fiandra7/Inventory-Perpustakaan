<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {

    if (auth()->check()) {

        return redirect()->route('dashboard');

    }

    return redirect()->route('login');

})->name('home');

Route::middleware('guest')->group(function () {

    Route::get('/login', [LoginController::class, 'showLoginForm'])
        ->name('login');

    Route::post('/login', [LoginController::class, 'login'])
        ->name('login.process');

});

Route::get('/register', [LoginController::class, 'showRegisterForm'])
    ->name('register');

Route::post('/register', [LoginController::class, 'register'])
    ->name('register.process');

Route::post('/google/login',
[LoginController::class, 'googleLogin'])
->name('google.login');

Route::middleware('auth')->group(function () {


    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');


    Route::resource('buku', BukuController::class);


    Route::post('/logout', [LoginController::class, 'logout'])
        ->name('logout');

});