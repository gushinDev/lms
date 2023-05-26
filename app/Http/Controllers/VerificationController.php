<?php

namespace App\Http\Controllers;

use App\Providers\RouteServiceProvider;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class VerificationController extends Controller
{
    public function sendVerificationEmail(): View
    {
        return view('auth.verify-email');
    }

    public function verifyUser(EmailVerificationRequest $request): RedirectResponse
    {
        $request->fulfill();
        return redirect(RouteServiceProvider::HOME);
    }
}
