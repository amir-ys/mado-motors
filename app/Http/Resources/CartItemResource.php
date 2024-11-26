<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CartItemResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'cart_id' => CartResource::make($this->whenLoaded('cart')),
            'product_id' => ProductResource::make($this->whenLoaded('product')),
            'product_variant_id' => ProductVariantResource::make($this->whenLoaded('productVariant')),
            'quantity' => $this->quantity,
            'price' => $this->price,
            'created_at' => $this->created_at,
        ];
    }
}
