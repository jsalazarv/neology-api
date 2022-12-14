<?php

namespace App\Http\Requests\document;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDocumentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'user_id' => ['sometimes', 'exists:users,id'],
            'file' => ['sometimes', 'file', 'max:5000'],
            'type' => ['required_with:file', 'string', 'in:picture,resume'],
        ];
    }
}
