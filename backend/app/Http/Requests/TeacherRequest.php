<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TeacherRequest extends FormRequest
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
            'user_id' => 'required|integer|exists:users,id',
            'title' => 'nullable|string|max:255',
            'about_me' => 'nullable|string',
            'about_class' => 'nullable|string',
            'job_title' => 'nullable|string|max:255',
            'years_experience' => 'nullable|integer',
            'price_one_class' => 'nullable|numeric',
            'price_two_classes' => 'nullable|numeric',
            'price_four_classes' => 'nullable|numeric',
            'certificate_file' => 'nullable|string|max:255',
            'average' => 'nullable|numeric',
            'sample_class' => 'required|boolean',
        ];
    }
}
