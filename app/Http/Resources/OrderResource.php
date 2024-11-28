<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'user' => UserResource::make($this->whenLoaded('user')),
            'address' => UserAddressResource::make($this->whenLoaded('address')),
            'total_price' => $this->total_price,
            'status' => $this->status,
            'created_at' => $this->created_at,
        ];
    }
}
