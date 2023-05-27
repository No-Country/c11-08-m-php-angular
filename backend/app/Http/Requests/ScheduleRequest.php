<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ScheduleRequest extends FormRequest
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
            'day' => 'required|numeric',
            //'name' => 'required|numeric',
            'active'=> 'nullable|numeric',
            'start_morning' => 'sometimes|date_format:H:i',
            'end_morning'=> 'sometimes|date_format:H:i',
            'start_afternoon'=> 'sometimes|date_format:H:i',
            'end_afternoon'=> 'sometimes|date_format:H:i',
            'start_night'=> 'sometimes|date_format:H:i',
            'end_night' => 'sometimes|date_format:H:i',
            'teacher_id'=> 'required|numeric|exists:teachers,id',
        ];
    }
}
