<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductDetailResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'order' => OrderResource::make($this->whenLoaded('order')),
            'owner' => UserResource::make($this->whenLoaded('owner')),
            'agent' => AgentResource::make($this->whenLoaded('agent')),
            'product' => ProductResource::make($this->whenLoaded('product')),
            'chassis_number' => $this->chassis_number,
            'engine_number' => $this->engine_number,
            'plaque_number' => $this->plaque_number,
            'year_of_production' => $this->year_of_production,
            'created_at' => $this->created_at,
        ];
    }
}
