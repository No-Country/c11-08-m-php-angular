<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class StoreUserRequest extends FormRequest
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
            "role"=> ['required', Rule::in(['Admin', 'Profesor', 'Estudiante'])],
            "first_name" => ['required', 'string', 'max:255'],
            "last_name" => ['required', 'string', 'max:255'],
            "email" => ['required','email', 'max:255', Rule::unique('users')->ignore($this->user)],
            "password" => ['required', 'confirmed', Password::min(8)],
            "birthdate" => ['nullable', 'date', 'date_format:Y-m-d'],
            "identification" => ['nullable', 'string', 'max:20'],
            "phone" => ['nullable', 'string', 'max:20'],
            "photo" => ['nullable', 'string'],
            "city_id" => ['nullable', 'integer', 'exists:cities,id'],
        ];
    }
}
