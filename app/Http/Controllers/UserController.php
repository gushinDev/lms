<?php

namespace App\Http\Controllers;

use App\Http\Requests\DeleteUserRequest;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(): View
    {
        $users = User::query()->paginate(12);
        return view('admin.users.index', compact('users'));
    }

    public function edit(Request $request)
    {

    }

    public function delete(DeleteUserRequest $request): RedirectResponse
    {
        User::find($request->user_id)->delete();
        return back()->with('success', 'Пользователь удален успешно.');
    }
}
