<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductReviewResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'product' => ProductResource::make($this->whenLoaded('product')),
            'user' => UserResource::make($this->whenLoaded('user')),
            'points' => ReviewPointResource::collection($this->whenLoaded('points')),
            'negative_points_count' => $this->whenNotNull($this->negative_points_count),
            'positive_points_count' => $this->whenNotNull($this->positive_points_count),
            'text' => $this->text,
            'status' => $this->status,
            'created_at' => $this->created_at,
        ];
    }
}
