<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository
{
    public function __construct(protected User $user)
    {
    }

    public function deleteUser(int $userId): ?bool
    {
        return $this->user->findOrFail($userId)->delete();
    }
}
