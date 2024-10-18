<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class)->name('home');

Route::get('/login', [LoginController::class, 'show'])
    ->name('login.show')
    ->middleware('guest');
Route::post('/login', [LoginController::class, 'store'])
    ->name('login.store')
    ->middleware('guest');
