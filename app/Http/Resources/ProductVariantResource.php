<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductVariantResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'original_price' => $this->original_price,
            'price' => $this->price,
            'quantity' => $this->quantity,
            'attributes' => AttributeValueResource::collection($this->whenLoaded('attributes')),
            'created_at' => $this->created_at,
        ];
    }
}
