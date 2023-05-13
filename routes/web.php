<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('main');


Route::get('/profile', [ProfileController::class, 'show'])->name('profile')->middleware('auth');
Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update')->middleware('auth');

Route::get('/login', fn() => view('login'))->name('login')->middleware('guest');
Route::get('/registration', fn() => view('registration'))->name('registration')->middleware('guest');

Route::get('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');
Route::post('/login', [AuthController::class, 'login'])->name('login.post')->middleware('guest');
