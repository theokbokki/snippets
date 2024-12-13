<?php

use App\Http\Controllers\CreateSnippetController;
use App\Http\Controllers\DeleteSnippetController;
use App\Http\Controllers\EditSnippetController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ListSnippetController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RestoreSnippetController;
use App\Http\Controllers\SearchController;
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

Route::get('/snippets', ListSnippetController::class)
    ->name('snippet.list')
    ->middleware('auth');

Route::post('/snippets/store', StoreSnippetController::class)
    ->name('snippet.store')
    ->middleware('auth');

Route::get('/snippet/{snippet}', ShowSnippetController::class)
    ->name('snippet.show')
    ->middleware('auth')
    ->withTrashed();

Route::get('/snippet/{snippet}/edit', EditSnippetController::class)
    ->name('snippet.edit')
    ->middleware('auth');

Route::post('/snippet/{snippet}/update', UpdateSnippetController::class)
    ->name('snippet.update')
    ->middleware('auth');

Route::post('/snippet/{snippet}/delete', DeleteSnippetController::class)
    ->name('snippet.delete')
    ->middleware('auth');

Route::post('/snippet/{snippet}/restore', RestoreSnippetController::class)
    ->name('snippet.restore')
    ->middleware('auth')
    ->withTrashed();

Route::post('/search', SearchController::class)
    ->name('search');
