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
        $schedules = [];
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
        
        if(count($schedules) > 0){
            $schedules = array_unique(array_merge($schedules[0], $schedules[1], $schedules[2], $schedules[3], $schedules[4], $schedules[5]));
        }
        
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'title' => $this->title,
            'about_me' => $this->about_me,
            'about_class' => $this->about_class,
            'job_title' => $this->job_title,
            'years_experience' => $this->years_experience,
            'price_one_class' => number_format($this->price_one_class, 2, ',', '.'),
            'price_two_classes' => number_format($this->price_two_classes, 2, ',', '.'),
            'price_four_classes' => number_format($this->price_four_classes, 2, ',', '.'),
            'certificate_file' => $this->certificate_file,
            'average' => $this->average,
            'sample_class' => $this->sample_class,
            'deleted_at' => $this->deleted_at,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'name' => $this->user->first_name . " " . $this->user->last_name,
            'photo' => $this->user->photo,
            'city_id' => ($this->user->city) ? $this->user->city->id : null,
            'city_name' => ($this->user->city) ? $this->user->city->name : null,
            'province_id' => ($this->user->city) ? $this->user->city->province->id : null,
            'province_name' => ($this->user->city) ? $this->user->city->province->name : null,
            'subjects' => $this->subjects->map->name,
            'schedules' => $schedules,
            'total_students' => $this->students->count(),
            'total_reviews' => $this->reviews->count(),
        ];
    }
}
