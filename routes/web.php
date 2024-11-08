<?php

use App\Http\Controllers\CreateSnippetController;
use App\Http\Controllers\EditSnippetController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ShowSnippetController;
use App\Http\Controllers\StoreLoginController;
use App\Http\Controllers\StoreSnippetController;
use App\Http\Controllers\UpdateSnippetController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class)->name('home');

Route::get('/login', LoginController::class)
    ->name('login')
    ->middleware('guest');

Route::post('/login', StoreLoginController::class)
    ->name('login.store')
    ->middleware('guest');

Route::get('/snippets/create', CreateSnippetController::class)
    ->name('snippet.create')
    ->middleware('auth');

Route::post('/snippets', StoreSnippetController::class)
    ->name('snippet.store')
    ->middleware('auth');

Route::get('/snippet/{snippet}', ShowSnippetController::class)
    ->name('snippet.show')
    ->middleware('auth');

Route::get('/snippet/{snippet}/edit', EditSnippetController::class)
    ->name('snippet.edit')
    ->middleware('auth');

Route::post('/snippet/{snippet}/update', UpdateSnippetController::class)
    ->name('snippet.update')
    ->middleware('auth');
