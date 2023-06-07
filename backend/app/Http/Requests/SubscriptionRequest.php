<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SubscriptionRequest extends FormRequest
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
            "plan" => ['required', 'array'],
            "plan.id" => ['required', 'integer', 'exists:plans,id'],
            "plan.type" => ['required', Rule::in(['3 meses', '6 meses', '1 año'])],
            "plan.price"  => ['required', 'numeric'],
            "plan.free_months"  => ['nullable', 'integer'],
            "payer_email" => ['required', 'email', 'max:255'],
        ];
    }
}
