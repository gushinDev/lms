<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

/**
 * @property string $users_export_file_type
 */
class UserExportRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'users_export_file_type' => ['required', 'string', Rule::in(['xlsx', 'csv', 'json'])]
        ];
    }

    public function getExportFileType(): string
    {
        return $this->users_export_file_type;
    }
}
