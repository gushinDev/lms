<?php

namespace App\Modules\Auth\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @property string $password
 * @property string $email
 */
class LoginRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:4'],
        ];
    }

    public function getLoginUserData(): array
    {
        return [
            'email' => $this->email,
            'password' => $this->password,
        ];
    }
}
