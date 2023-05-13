<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('main');


Route::get('/profile', [ProfileController::class, 'show'])->name('profile');
Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
Route::get('/login', fn() => view('login'))->name('login');
Route::get('/registration', fn() => view('registration'))->name('registration');
