<?php

namespace App\Http\Controllers\Admin\AttributeValue;

use App\Contracts\AttributeValueRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Http\Resources\AttributeValueResource;
use App\Utilities\ApiResponse;
use Illuminate\Http\JsonResponse;

class ShowAttributeValue extends Controller
{
    public function __invoke($id): JsonResponse
    {
        return ApiResponse::success(
            AttributeValueResource::make(
                app(AttributeValueRepositoryInterface::class)
                    ->with(['attribute'])
                    ->find($id)
            )
        );
    }
}
