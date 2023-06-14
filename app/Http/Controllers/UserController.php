<?php

namespace App\Http\Controllers;

use App\Http\Requests\DeleteUserRequest;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct(protected UserService $userService)
    {
    }
    public function index(Request $request): View
    {
        $usersBuilder = User::query();
        if ($sorting = $request->sort_by) {
            $usersBuilder->orderBy($sorting, $request->sort_direction === 'asc' ? 'desc' : 'asc');
        }
        $users = $usersBuilder->paginate(12);
        return view('admin.users.index', [
            "users" => $users,
            'sortDirectionId' => $request->sort_direction === 'asc' ? 'desc' : 'asc',
        ]);
    }

    public function edit(Request $request)
    {

    }

    public function delete(DeleteUserRequest $request): RedirectResponse
    {
        $this->userService->deleteUser($request->getUserId());

        return back()->with('success', 'Пользователь удален успешно.');
    }
}
