<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderItemResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'product_id' => ProductResource::make($this->whenLoaded('product')),
            'product_variant_id' => ProductVariantResource::make($this->whenLoaded('productVariant')),
            'order' => OrderResource::make($this->whenLoaded('order')),
            'quantity' => $this->quantity,
            'price' => $this->price,
            'created_at' => $this->created_at,
        ];
    }
}