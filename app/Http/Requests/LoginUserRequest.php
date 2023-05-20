<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @property string $username
 * @property string $password
 * @property bool $remember
 */
class LoginUserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'username' => 'required|string|max:255',
            'password' => 'required|string'
        ];
    }

    public function getUserLoginCredentials(): array
    {
        return [
            'username' => $this->username,
            'password' => $this->password
        ];
    }

    public function needToRemember(): bool
    {
        return (bool) $this->remember;
    }
}
