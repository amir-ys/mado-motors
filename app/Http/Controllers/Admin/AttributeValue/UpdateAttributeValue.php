<?php

namespace App\Http\Controllers\Admin\AttributeValue;

use App\Contracts\AttributeValueRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\AttributeValue\UpdateAttributeValueRequest;
use App\Http\Resources\AttributeValueResource;
use App\Utilities\ApiResponse;
use Illuminate\Http\JsonResponse;

class UpdateAttributeValue extends Controller
{
    public function __invoke($id, UpdateAttributeValueRequest $updateAttributeValueRequest): JsonResponse
    {
        return ApiResponse::success(
            AttributeValueResource::make(
                app(AttributeValueRepositoryInterface::class)->update(
                    $updateAttributeValueRequest->validated(),
                    $id
                )
            )
        );
    }
}
