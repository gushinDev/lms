<?php

namespace App\Modules\Auth\Services;

use App\Modules\User\Model\User;

class AuthService
{
    public function createUser(array $userRegistrationData): User
    {
        return User::create($userRegistrationData);
    }
}
