<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\UserExportController;
use Illuminate\Support\Facades\Route;

Route::get('/', [UserController::class, 'index'])->name('admin.index');
Route::get('users', [UserController::class, 'index'])->name('users.index');
Route::delete('users', [UserController::class, 'delete'])->name('users.delete');
Route::get('users/{user_id}/edit', [UserController::class, 'edit'])->name('users.edit');
Route::post('users/export', [UserExportController::class, 'export'])->name('users.export');
