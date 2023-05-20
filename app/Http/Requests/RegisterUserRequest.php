<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

/**
 * @property string $password
 * @property string $email
 * @property string $username
 */
class RegisterUserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'username' => 'required|string|min:5|max:255|unique:users,username',
            'email' => 'required|string|max:255|email|unique:users,email',
            'password' => ['required', 'confirmed'],
        ];
    }

    public function getUserRegistrationCredentials(): array
    {
        return [
            'username' => $this->username,
            'email' => $this->email,
            'password' => Hash::make($this->password)
        ];
    }
}
