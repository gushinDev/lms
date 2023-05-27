<?php

namespace App\Http\Requests;

use App\Rules\NeverDeleteYourself;
use Illuminate\Foundation\Http\FormRequest;

/**
 * @property int $user_id
 */
class DeleteUserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'user_id' => ['integer', 'min:1', new NeverDeleteYourself]
        ];
    }

    public function getUserId(): int
    {
        return (int) $this->user_id;
    }
}
