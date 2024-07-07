<?php

use App\Http\Controllers\StoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostController;
use App\Http\Middleware\Admin;

Route::get('/', [StoryController::class, 'index']);


Route::prefix('/login')->group(function () {
    Route::get('/login-basic', [LoginController::class, 'index'])->name('login-basic');
    Route::get('/auth-login', [LoginController::class, 'authenticate'])->name('auth-login');
});
Route::get('/get-post-view', [PostController::class, 'create'])->name('create_post_view');

Route::prefix('/admin')->group(function () {
    Route::post('/post', [PostController::class, 'create'])->name('create-post');
});
Route::get('/approved/{id}', [PostController::class, 'approved'])->name('app-email');









