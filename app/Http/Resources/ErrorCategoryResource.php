<?php

namespace App\Http\Resources;

use App\Services\Media\Resources\MediaResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ErrorCategoryResource extends JsonResource
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
            'title' => $this->title,
            'title_en' => $this->title_en,
            'error_brands' => ErrorBrandResource::collection($this->whenLoaded('errorBrands')),
            'errors' => ErrorResource::collection($this->whenLoaded('errors')),
            'media' => MediaResource::collection($this->whenLoaded('media')),
            'thumbnail' => $this->getFirstMediaUrl('main_image', 'thumbnail'),
            'main_image' => $this->getFirstMediaUrl('main_image'),
        ];
    }
}
