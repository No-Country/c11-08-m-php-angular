<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PaymentResource extends JsonResource
{
    
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'teacher_id' => $this->teacher_id,
            'plan_id' => $this->plan_id,
            'fee' => $this->fee,
            'total_paid' => $this->total_paid,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'deleted_at' => $this->deleted_at,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'plan_type' => ($this->plan) ? $this->plan->type : null,
            'plan_price' => ($this->plan) ? $this->plan->price : null,
            'plan_free_months' => ($this->plan) ? $this->plan->free_months : null,
        ];
    }
}
