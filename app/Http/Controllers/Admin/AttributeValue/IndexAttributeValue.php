<?php

namespace App\Http\Controllers\Admin\AttributeValue;

use App\Contracts\Repositories\AttributeValueRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Http\Resources\AttributeValueResource;
use App\Utilities\ApiResponse;
use Illuminate\Http\JsonResponse;

class IndexAttributeValue extends Controller
{
    public function __invoke(): JsonResponse
    {
        return ApiResponse::success(
            AttributeValueResource::collection(
                app(AttributeValueRepositoryInterface::class)
                    ->with(['attribute'])
                    ->index()
            )
        );
    }
}
