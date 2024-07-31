<?php

use App\Http\Controllers\StoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostController;

Route::get('/', [StoryController::class, 'index']);


Route::prefix('/login')->group(function () {
    Route::get('/login-basic', [LoginController::class, 'index'])->name('login');
    Route::post('/auth-login', [LoginController::class, 'authenticate'])->name('auth-login');
});

Route::middleware('auth')->group(function () {
    Route::prefix('/admin')->group(function () {
        Route::get('/admin-panel', [LoginController::class, 'adminPanel'])->name('admin-panel');
        Route::post('/post', [PostController::class, 'create'])->name('post-create');
        Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
    });
    Route::get('/approved/{token}', [PostController::class, 'approved'])->name('app-email');
});











