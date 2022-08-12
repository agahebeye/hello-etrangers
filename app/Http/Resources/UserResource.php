<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Arr;

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
            'fullname' => $this->fullname,
            'firstName' => $this->first_name,
            'lastName' => $this->last_name,
            'photo' => $this->photo,
            'role' => $this->role,

            $this->merge(Arr::except(parent::toArray($request), ['created_at', 'email_verified_at', 'updated_at']))
        ];
    }
}
