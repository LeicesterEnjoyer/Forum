<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\ThreadController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Categories Routes
Route::resource('categories', CategoryController::class);

// Threads Routes
Route::resource('threads', ThreadController::class);

// Posts Routes
Route::resource('posts', PostController::class);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::resource('posts', PostController::class);

    Route::resource('threads', ThreadController::class);

    Route::resource('category', CategoryController::class);
});

require __DIR__.'/auth.php';
