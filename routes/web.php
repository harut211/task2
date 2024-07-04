<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostController;

Route::get('/', [PostController::class, 'index']);


Route::prefix('/login')->group(function () {
    Route::get('/login-basic', [LoginController::class, 'index'])->name('login');
    Route::get('/auth-login', [LoginController::class, 'authenticate'])->name('auth-login');
});

Route::prefix('/admin')->group(function () {
    Route::post('/post', [PostController::class, 'create'])->name('post-create');

});
Route::get('/approved/{id}', [PostController::class, 'approved'])->name('app-email');









