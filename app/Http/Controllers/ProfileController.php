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
//        $user = Auth::user();
        $user = User::first();
        return view('profile', ['user' => $user]);
    }

    //TODO поменять на Auth::user()
    public function update(Request $request): RedirectResponse
    {
        $user = User::find(1)->update($request->all());
        return redirect('profile');
    }
}
