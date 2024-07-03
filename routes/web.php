<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/login', [LoginController::class, 'index'])->name('login');

Route::get('/signin', [LoginController::class, 'authenticate'])->name('signin');

Route::post('/post', [PostController::class, 'create'])->name('logout');

Route::get('/approved', [PostController::class, 'approved'])->name('approved');


