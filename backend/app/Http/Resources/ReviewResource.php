<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ReviewResource extends JsonResource
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
            "teacher_id" => $this->teacher_id,
            "student_id" => $this->student_id,
            "comment" => $this->comment,
            "qualification" => $this->qualification,
            'student_name' => $this->student->user->first_name . " " . $this->student->user->last_name,
            'student_photo' => $this->student->user->photo,
        ];
    }
}
