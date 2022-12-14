<?php

namespace App\Http\Requests\user;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'name' => ['sometimes', 'string', 'max:255'],
            'last_name' => ['sometimes', 'string', 'max:255'],
            'username' => ['sometimes', 'string', 'max:255', 'min:6'],
            'email' => [
                'sometimes',
                'email',
                'string',
                'max:255',
                Rule::unique('users')->ignore(request('id')),
            ],
            'password' => ['sometimes', 'string', 'max:255', 'min:6'],
            'role' => ['sometimes', 'string', 'max:255', "in:employee,admin"],
            'status' => ['sometimes', 'string', 'max:255', "in:active,inactive"],
        ];
    }
}
