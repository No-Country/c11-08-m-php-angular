<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ClaseResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'teacher_id' => $this->teacher_id,
            'student_id' => $this->student_id,
            'subject_id' => $this->subject_id,
            'scheduled_date' => $this->scheduled_date,
            'start_time' => $this->start_time,
            'end_time' => $this->end_time,
            'description' => $this->description,
            'state' => $this->state,
            'deleted_at' => $this->deleted_at,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'teacher_name' => $this->teacher->user->first_name . " " . $this->teacher->user->last_name,
            'student_name' => $this->student->user->first_name . " " . $this->teacher->user->last_name,
            'subject_name' => $this->subject->name,
        ];
    }
}
