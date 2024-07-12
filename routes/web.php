<?php

use App\Http\Controllers\StoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostController;
use App\Http\Middleware\Admin;

Route::get('/', [StoryController::class, 'index']);


Route::prefix('/login')->group(function () {
    Route::get('/login-basic', [LoginController::class, 'index'])->name('login-basic');
   // Route::get('redirect', [LoginController::class, 'redirect'])->name('login.redirect');
    Route::get('/auth-login', [LoginController::class, 'authenticate'])->name('auth-login');
});

Route::prefix('/admin')->group(function () {
    Route::get('/admin-panel',[LoginController::class, 'adminPanel'])->name('admin-panel');
    Route::post('/post', [PostController::class, 'create'])->name('post-create')->middleware(Admin::class);

});
Route::get('/approved/{id}', [PostController::class, 'approved'])->name('app-email')->middleware(Admin::class);









