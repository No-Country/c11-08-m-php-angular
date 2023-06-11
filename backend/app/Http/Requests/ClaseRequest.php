<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClaseRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'teacher_id' => 'required|integer|exists:teachers,id',
            'student_id' => 'required|integer|exists:students,id',
            'subject_id' => 'required|integer|exists:subjects,id',
            'scheduled_date' => 'required|date|after:now',
            'start_time' => 'sometimes|date_format:H:i',
            'end_time'=> 'sometimes|date_format:H:i',
            'description' => 'nullable|string',
            'state' => 'sometimes|nullable|in:Pendiente,Confirmado,Finalizado,Cancelado',
        ];
    }
}
