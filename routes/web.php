<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;


Route::get('/', function () {
    return view('login');
});

// Product routes
Route::resource('productos', ProductoController::class)->middleware('auth');

// Registration routes
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('registrar');
Route::post('/register', [RegisterController::class, 'register']);

// Authentication routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/dashboard', [LoginController::class, 'dashboard'])->middleware('auth')->name('dashboard');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
