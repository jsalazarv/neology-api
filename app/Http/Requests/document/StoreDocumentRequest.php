<?php

namespace App\Http\Requests\document;

use Illuminate\Foundation\Http\FormRequest;

class StoreDocumentRequest extends FormRequest
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
            'user_id' => ['required', 'exists:users,id'],
            'file' => ['required', 'file', 'max:5000'],
            'type' => ['required', 'string', 'in:picture,resume'],
        ];
    }
}
