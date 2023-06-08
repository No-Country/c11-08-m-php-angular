<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreSubjectRequest extends FormRequest
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
            "user_id" => ['required', 'integer', 'exists:users,id'],
            "subject_id" => ['required', 'integer', 'exists:subjects,id'],
            "years_experience" => ['nullable', 'integer'],
            "level" => ['nullable', 'string', Rule::in(['Básico', 'Intermedio', 'Avanzado'])],
            "certificate_file" => ['nullable', 'string', 'max:255'],
        ];
    }
}
