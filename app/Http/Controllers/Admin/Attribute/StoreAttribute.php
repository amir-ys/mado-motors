<?php

namespace App\Http\Controllers\Admin\Attribute;

use App\Contracts\AttributeRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Attribute\StoreAttributeRequest;
use App\Http\Resources\AttributeResource;
use App\Utilities\ApiResponse;
use Illuminate\Http\JsonResponse;

class StoreAttribute extends Controller
{
    public function __invoke(StoreAttributeRequest $createAttributeRequest): JsonResponse
    {
        return ApiResponse::created(
            AttributeResource::make(
                app(AttributeRepositoryInterface::class)->create(
                    $createAttributeRequest->validated()
                )
            )
        );
    }
}
