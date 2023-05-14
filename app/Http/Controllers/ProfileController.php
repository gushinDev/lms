<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function show(): View
    {
        return view('profile', ['user' => Auth::user()]);
    }

    public function update(Request $request): RedirectResponse
    {
        Auth::user()->update($request->all());
        return redirect('profile');
    }
}
