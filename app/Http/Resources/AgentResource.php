<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AgentResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'code' => $this->code,
            'user' => UserResource::make($this->whenLoaded('user')),
            'address' => UserAddressResource::make($this->whenLoaded('address')),
            'created_at' => $this->created_at,
        ];
    }
}
