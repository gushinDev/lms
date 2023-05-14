<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


Route::group(['middleware' => 'auth'], function() {
    Route::get('/', fn() => view('welcome'))->name('main');
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::group(['middleware' => 'guest'], function() {
    Route::get('/login', fn() => view('login'))->name('login');
    Route::get('/registration', fn() => view('registration'))->name('registration');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');
});
