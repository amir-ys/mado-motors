<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ErrorCodeResource extends JsonResource
{
    public function toArray( $request ): array
    {
        return [
            'id' => $this->id ,
            'key' => $this->key ,
            'value' => $this->value ,
            'error_item' => ErrorItemResource::make( $this->whenLoaded( 'errorItem' ) ) ,
            'created_at' => $this->created_at ,
        ];
    }
}
