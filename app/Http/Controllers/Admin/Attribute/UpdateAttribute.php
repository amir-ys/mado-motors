<?php

namespace App\Http\Controllers\Admin\Attribute;

use App\Contracts\AttributeRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\Attribute\UpdateAttributeValueRequest;
use App\Http\Resources\AttributeResource;
use App\Utilities\ApiResponse;
use Illuminate\Http\JsonResponse;

class UpdateAttribute extends Controller
{
    public function __invoke($id, UpdateAttributeValueRequest $updateAttributeRequest): JsonResponse
    {
        return ApiResponse::success(
            AttributeResource::make(
                app(AttributeRepositoryInterface::class)->update(
                    $updateAttributeRequest->validated(),
                    $id
                )
            )
        );
    }
}
