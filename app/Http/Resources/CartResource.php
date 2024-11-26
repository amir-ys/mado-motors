<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CartResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'user' => UserResource::make($this->whenLoaded('user')),
            'items' => CartItemResource::collection($this->whenLoaded('items')),
            'total_price' => $this->total_price,
            'created_at' => $this->created_at,
        ];
    }
}
