<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\URL;

class UserResource extends JsonResource
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
            "id" => $this->id,
            "email" => $this->email,
            "role" => $this->role,
            "first_name" => $this->first_name,
            "last_name" => $this->last_name,
            "birthdate" => $this->birthdate,
            "identification" => $this->identification,
            "phone" => $this->phone,
            "photo" => $this->photo ? URL::to($this->photo) : null,
            "last_connection" => $this->last_connection,
            "email_verified_at" => $this->email_verified_at,
            "deleted_at" => $this->deleted_at,
            "created_at" => $this->created_at,
            "updated_at" => $this->updated_at,
            "city_id" => $this->city_id,
            'city_name' => ($this->city) ? $this->city->name : null,
            'province_id' => ($this->city) ? $this->city->province->id : null,
            'province_name' => ($this->city) ? $this->city->province->name : null,
        ];
    }
}
