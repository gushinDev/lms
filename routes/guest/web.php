<?php

use App\Http\Controllers\LoginUserController;
use App\Http\Controllers\PasswordResetController;
use App\Http\Controllers\RegisterUserController;
use Illuminate\Support\Facades\Route;

Route::get('/login', [LoginUserController::class, 'loginForm'])->name('login');
Route::post('/login', [LoginUserController::class, 'login'])->name('login.post');

Route::get('/register', [RegisterUserController::class, 'registerView'])->name('register.create');
Route::post('/register', [RegisterUserController::class, 'register'])->name('register.store');

Route::get('/forgot-password', [PasswordResetController::class, 'resetPasswordEmailForm'])
    ->name('password.request');
Route::post('/forgot-password', [PasswordResetController::class, 'sendResetPasswordLink'])->name('password.email');
Route::get('/reset-password/{token}', [PasswordResetController::class, 'setNewPasswordForm'])
    ->name('password.reset');
Route::post('/reset-password', [PasswordResetController::class, 'setNewPassword'])->name('password.update');
