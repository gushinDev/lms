<?php

namespace App\Services;

use App\Models\User;

class UserService
{
    public function __construct(protected User $user)
    {
    }

    public function deleteUser(int $userId): ?bool
    {
        return $this->user->findOrFail($userId)->delete();
    }
}
