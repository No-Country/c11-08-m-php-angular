<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ListScheduleRequest extends FormRequest
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
            "schedules" => ['required', 'array'],
            'schedules.*' => ['required', 'array'],
            'schedules.*.day' => ['required', 'integer', Rule::in([1,2,3,4,5,6])],
            'schedules.*.active' => ['required', 'boolean'],
            'schedules.*.start_morning' => ['nullable', 'date_format:H:i', Rule::notIn(['00:00'])],
            'schedules.*.end_morning' => ['nullable', 'date_format:H:i', Rule::notIn(['00:00'])],
            'schedules.*.start_afternoon' => ['nullable', 'date_format:H:i', Rule::notIn(['00:00'])],
            'schedules.*.end_afternoon' => ['nullable', 'date_format:H:i', Rule::notIn(['00:00']), 'different:start_afternoon'],
            'schedules.*.start_night' => ['nullable', 'date_format:H:i', Rule::notIn(['00:00'])],
            'schedules.*.end_night' => ['nullable', 'date_format:H:i', Rule::notIn(['00:00']), 'different:start_night'],
            'schedules.*.teacher_id' => 'required|integer|exists:teachers,id',
        ];
    }
}
