<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\URL;

class StudentResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'description' =>$this->description,
            'deleted_at' => $this->deleted_at,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'name' => $this->user->first_name . " " . $this->user->last_name,
            'email' => $this->user->email,
            'photo' => $this->user->photo ? URL::to($this->user->photo) : null,
            'city' => ($this->user->city) ? $this->user->city->name : null,
            'province' => ($this->user->city) ? $this->user->city->province->name : null,
            'classes_subjects' => $this->classes->map->subject->map->name,
            'subjects' => $this->subjects->map->name,
        ];
    }
}
