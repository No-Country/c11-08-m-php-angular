<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ScheduleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'day' => $this->day, 
            'active' => $this->active, 
            'start_morning' => substr($this->start_morning, 0, 5),
            'end_morning' => substr($this->end_morning, 0, 5),
            'start_afternoon' => substr($this->start_afternoon, 0, 5),
            'end_afternoon' => substr($this->end_afternoon, 0, 5),
            'start_night' => substr($this->start_night, 0, 5),
            'end_night' => substr($this->end_night, 0, 5),
            'teacher_id' => $this->teacher_id,
        ];
    }
}
