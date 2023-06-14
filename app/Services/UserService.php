<?php

namespace App\Services;

use App\Repositories\UserRepository;

class UserService
{
    public function __construct(protected UserRepository $userRepository)
    {
    }

    public function deleteUser(int $userId): ?bool
    {
        return $this->userRepository->deleteUser($userId);
    }
}
