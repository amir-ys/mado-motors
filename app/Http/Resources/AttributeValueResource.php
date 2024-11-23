<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AttributeValueResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'value' => $this->value,
            'attribute' => new AttributeResource($this->whenLoaded('attribute')),
            'created_at' => $this->created_at,
        ];
    }
}
