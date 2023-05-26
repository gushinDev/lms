<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginUserRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginUserController extends Controller
{
    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('login');
    }

    public function loginForm(): View
    {
        return view('login');
    }

    public function login(LoginUserRequest $request): RedirectResponse
    {
        if (Auth::attempt($request->getUserLoginCredentials(), $request->needToRemember())) {
            $request->session()->regenerate();

            return redirect(RouteServiceProvider::HOME);
        }

        return back()->withErrors([
            'username' => 'The provided credentials do not match our records.',
        ])->onlyInput('username');
    }
}
