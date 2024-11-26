<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ReviewPointResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'product_id' => ProductResource::make($this->whenLoaded('product')),
            'type' => $this->type,
            'text' => $this->text,
            'created_at' => $this->created_at,
        ];
    }
}
