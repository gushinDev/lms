<?php

use App\Http\Controllers\LoginUserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VerificationController;
use Illuminate\Support\Facades\Route;

Route::get('/posts', [PostController::class, 'index'])->name('posts');
Route::get('/', fn() => view('main'))->name('main');
Route::get('/profile', [ProfileController::class, 'show'])->name('profile');
Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
Route::get('/logout', [LoginUserController::class, 'logout'])->name('logout');
Route::get('/email/verify', [VerificationController::class, 'sendVerificationEmail'])->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', [VerificationController::class, 'verifyUser'])->middleware(['signed'])
    ->name('verification.verify');
