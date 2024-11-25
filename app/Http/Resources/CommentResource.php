<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CommentResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'user_id' => UserResource::make($this->whenLoaded('user')),
            'parent_id' => CommentResource::make($this->whenLoaded('parent')),
            'body' => $this->body,
            'status' => $this->status,
            'created_at' => $this->created_at,
        ];
    }
}
