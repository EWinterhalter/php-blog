<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\AuthController;

Route::get('/', fn() => redirect()->route('posts.index'));
Route::resource('posts', PostController::class);

Route::get('register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('register', [AuthController::class, 'register']);

Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);

Route::post('logout', [AuthController::class, 'logout'])->name('logout');

Route::resource('posts', PostController::class)
     ->except(['index','show'])
     ->middleware('auth');

     Route::resource('posts', PostController::class)
     ->except(['index','show'])
     ->middleware('auth');

Route::resource('posts', PostController::class)
     ->only(['index','show']);

