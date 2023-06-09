<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PaymentRequest extends FormRequest
{
    
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'teacher_id' => 'required|integer',
            'plan_id' => 'required|integer',
            'fee' => 'required|integer',
            'total_paid' => 'required|numeric',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
        ];
    }
}
