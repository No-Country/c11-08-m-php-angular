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
            'name' => $this->name, 
            'active' => $this->active, 
            'start_morning' => $this->start_morning,
            'end_morning' => $this->end_morning,
            'start_afternoon' => $this->start_afternoon,
            'end_afternoon' => $this->end_afternoon,
            'start_night' => $this->start_night,
            'end_night' => $this->end_night,
            'teacher_id' => $this->teacher_id,
            // 'teacher' => $this->teacher,
            'teacher' => new TeacherResource($this->teacher),
        ];
    }
}
