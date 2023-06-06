<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SearchTeacherRequest extends FormRequest
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
            "subject" => ['nullable', 'string'],
            "city" => ['nullable', 'integer'],
            "availability" => ['array'],
            'availability.*' => ['nullable', 'string', Rule::in(['Mañana', 'Tarde', 'Noche', 'mañana', 'tarde', 'noche'])],
            "price" => ['array'],
            'price.*' => ['nullable', 'integer'],
            "order" => ['nullable', 'string', Rule::in(['Mayor calificación', 'Menor calificación', 'Mayor precio', 'Menor precio', 'Más recientes'])],
        ];
    }
}
