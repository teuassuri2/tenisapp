<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class UserResource extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
'id' => $this->id,
'name' => $this->name,
'phone' => $this->phone,
'email' => $this->email,
'remember_token' => $this->remember_token,
'password' => $this->password,
'email_verified_at' => $this->email_verified_at,
'client_id' => $this->client_id,];

    }
}

