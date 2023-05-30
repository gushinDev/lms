<?php

use App\Http\Controllers\AdminNavigation;
use App\Http\Controllers\LoginUserController;
use App\Http\Controllers\PasswordResetController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterUserController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserExportController;
use App\Http\Controllers\VerificationController;
use Illuminate\Support\Facades\Route;
use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', fn() => view('welcome'))->name('main');
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('/logout', [LoginUserController::class, 'logout'])->name('logout');
    Route::get('/email/verify', [VerificationController::class, 'sendVerificationEmail'])->name('verification.notice');

    Route::get('/email/verify/{id}/{hash}', [VerificationController::class, 'verifyUser'])->middleware(['signed'])
        ->name('verification.verify');
});

Route::group(['middleware' => 'guest'], function () {
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
});

Route::group(['prefix' => 'admin'], function () {
    Route::get('/', [UserController::class, 'index'])->name('admin.index');
    Route::get('users', [UserController::class, 'index'])->name('users.index');
    Route::delete('users', [UserController::class, 'delete'])->name('users.delete');
    Route::get('users/{user_id}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::post('users/export', [UserExportController::class, 'export'])->name('users.export');
});

Route::get('/send', function() {
    $connection = new AMQPStreamConnection(env('RABBITMQ_HOST'), 5672, 'local', 'local');
    $channel = $connection->channel();
    $channel->queue_declare('hello', false, false, false, false);

    $arr = [2,3,5];
    $str = json_encode($arr);

    $msg = new AMQPMessage($str);
    $channel->basic_publish($msg, '', 'hello');
    $channel->close();
    $connection->close();
});
