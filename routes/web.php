<?php

use App\Http\Controllers\AdminNavigation;
use App\Http\Controllers\LoginUserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterUserController;
use App\Http\Controllers\UserController;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', fn() => view('welcome'))->name('main');
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('/logout', [LoginUserController::class, 'logout'])->name('logout');
    Route::get('/email/verify', function () {
        return view('auth.verify-email');
    })->name('verification.notice');

    Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
        $request->fulfill();
        return redirect(RouteServiceProvider::HOME);
    })->middleware(['signed'])->name('verification.verify');
});

Route::group(['middleware' => 'guest'], function () {
    Route::get('/login', fn() => view('login'))->name('login');
    Route::post('/login', [LoginUserController::class, 'login'])->name('login.post');

    Route::get('/register', [RegisterUserController::class, 'registerView'])->name('register.create');
    Route::post('/register', [RegisterUserController::class, 'register'])->name('register.store');

    Route::get('/forgot-password', function () {
        return view('auth.password-reset');
    })->name('password.request');

    Route::post('/forgot-password', function (Request $request) {
        $request->validate(['email' => 'required|email']);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
            ? back()->with(['status' => __($status)])
            : back()->withErrors(['email' => __($status)]);
    })->name('password.email');

    Route::get('/reset-password/{token}', function ($token) {
        return view('auth.reset-password', ['token' => $token]);
    })->name('password.reset');


    Route::post('/reset-password', function (Request $request) {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));

                $user->save();

                event(new PasswordReset($user));
            }
        );

        return $status === Password::PASSWORD_RESET
            ? redirect()->route('login')->with('status', __($status))
            : back()->withErrors(['email' => [__($status)]]);
    })->name('password.update');
});

Route::get('admin/navigation-panel', [AdminNavigation::class, 'index'])->name('navigation');
Route::delete('admin/users', [UserController::class, 'index'])->name('users.index');
