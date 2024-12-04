<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'title_fa' => $this->title_fa,
            'title_en' => $this->title_en,
            'description' => $this->description,
            'spod_id' => $this->spod_id,
            'original_price' => $this->original_price,
            'price' => $this->price,
            'quantity' => $this->quantity,
            'category' => ProductCategoryResource::make($this->whenLoaded('category')),
            'creator' => UserResource::make($this->whenLoaded('creator')),
            'variants' => ProductVariantResource::collection($this->whenLoaded('variants')),
//            'media' => MediaResource::collection($this->whenLoaded('media')),
//            'main_image' => $this->getFirstMediaUrl('main_image'),
            'relatedProducts' => ProductResource::collection($this->whenLoaded('relatedProducts')),
            'created_at' => $this->created_at,
        ];
    }
}
