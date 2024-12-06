<?php

namespace App\Http\Controllers\Admin\AttributeValue;

use App\Contracts\Repositories\AttributeValueRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AttributeValue\StoreAttributeValueRequest;
use App\Http\Resources\AttributeValueResource;
use App\Utilities\ApiResponse;
use Illuminate\Http\JsonResponse;

class StoreAttributeValue extends Controller
{
    public function __invoke(StoreAttributeValueRequest $createAttributeValueRequest): JsonResponse
    {
        return ApiResponse::created(
            AttributeValueResource::make(
                app(AttributeValueRepositoryInterface::class)->create(
                    $createAttributeValueRequest->validated()
                )
            )
        );
    }
}
