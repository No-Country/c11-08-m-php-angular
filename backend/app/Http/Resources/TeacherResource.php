<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TeacherResource extends JsonResource
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
            'user_id' => $this->user_id,
            'title' => $this->title,
            'about_me' => $this->about_me,
            'about_class' => $this->about_class,
            'job_title' => $this->job_title,
            'years_experience' => $this->years_experience,
            'price_one_class' => $this->price_one_class,
            'price_two_classes' => $this->price_two_classes,
            'price_four_classes' => $this->price_four_classes,
            'certificate_file' => $this->certificate_file,
            'average' => $this->average,
            'sample_class' => $this->sample_class,
            'deleted_at' => $this->deleted_at,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'user' => $this->user,
            'city' => $this->user->city,
            'subjects' => $this->subjects,
            'schedules' => $this->schedules,
            'reviews' => $this->reviews,
        ];
    }
}
