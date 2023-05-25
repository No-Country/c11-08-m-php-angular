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
    {   $schedules = [];
        $schedules = $this->schedules->map(function($schedule){
            $turn = [];
            if(!is_null($schedule['start_morning']) && !is_null($schedule['end_morning'])){
                $turn[] = 'Mañana';
            }
            if(!is_null($schedule['start_afternoon']) && !is_null($schedule['end_afternoon'])){
                $turn[] = 'Tarde';
            }
            if(!is_null($schedule['start_night']) && !is_null($schedule['end_night'])){
                $turn[] = 'Noche';
            }
            return $turn;

        });
        
        $schedules = array_unique(array_merge($schedules[0], $schedules[1], $schedules[2], $schedules[3], $schedules[4], $schedules[5]));
        
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
            'name' => $this->user->first_name . " " . $this->user->last_name,
            'photo' => $this->user->photo,
            'city' => $this->user->city->name,
            'subjects' => $this->subjects->map->name,
            'schedules' => $schedules,
            'total_students' => $this->students->count(),
            'total_reviews' => $this->reviews->count(),
        ];
    }
}
