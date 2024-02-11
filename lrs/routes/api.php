<?php

use App\Modules\Auth\Controllers\AuthController;
use App\Modules\Statement\Controllers\StatementController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/registration', [AuthController::class, 'registration'])->name('registration');

Route::middleware(['auth:sanctum'])->group(function() {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/me', [AuthController::class, 'me'])->name('me');
});

Route::get('/users', function (Request $request) {
   $users = \App\Modules\User\Model\User::query()->get();
   return view('users', compact('users'));
});

Route::get('/info', function() {
    return phpinfo();
});
