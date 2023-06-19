<?php

use App\Http\Controllers\ExportController;
use App\Http\Controllers\AminPostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserExportController;
use Illuminate\Support\Facades\Route;

Route::get('/', [UserController::class, 'index'])->name('admin.index');
Route::get('users', [UserController::class, 'index'])->name('users.index');
Route::delete('users', [UserController::class, 'delete'])->name('users.delete');
Route::get('users/{user_id}/edit', [UserController::class, 'edit'])->name('users.edit');
Route::post('users/export', [UserExportController::class, 'export'])->name('users.export');
Route::get('/exports', [ExportController::class, 'index'])->name('export.index');
Route::get('/exports/{export_id}', [ExportController::class, 'download'])->name('export.download');
Route::get('/posts', [AminPostController::class, 'index'])->name('admin.posts.index');
Route::get('/posts/create', [AminPostController::class, 'create'])->name('admin.posts.create');
Route::post('/posts', [AminPostController::class, 'store'])->name('admin.posts.store');
