<?php

use App\Http\Controllers\LoginUserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterUserController;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;


Route::group(['middleware' => 'auth'], function () {
    Route::get('/', fn() => view('welcome'))->name('main');
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('/logout', [LoginUserController::class, 'logout'])->name('logout');
});

Route::group(['middleware' => 'guest'], function () {
    Route::get('/login', fn() => view('login'))->name('login');
    Route::post('/login', [LoginUserController::class, 'login'])->name('login.post');

    Route::get('/register', [RegisterUserController::class, 'registerView'])->name('register.create');
    Route::post('/register', [RegisterUserController::class, 'register'])->name('register.store');
});

Route::get('/send', function () {
    dd(\Illuminate\Support\Facades\Cache::set('kill', 2));
});
