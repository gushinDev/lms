<?php

use App\Http\Controllers\AminPostController;
use Illuminate\Support\Facades\Route;

Route::post('/posts', [AminPostController::class, 'store'])->name('admin.posts.store');
