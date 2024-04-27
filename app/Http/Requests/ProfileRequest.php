<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'Firstname' => 'sometimes|string|max:40',
            'Lastname' => 'sometimes|string|max:40',
            'email' => 'sometimes|email|max:100',
            'description'=> 'sometimes|string|max:300',
            'speciality' => 'sometimes',
        ];
    }
}
