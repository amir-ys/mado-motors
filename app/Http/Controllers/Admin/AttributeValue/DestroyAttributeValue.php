<?php

namespace App\Http\Controllers\Admin\AttributeValue;

use App\Contracts\AttributeValueRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Utilities\ApiResponse;
use Illuminate\Http\JsonResponse;

class DestroyAttributeValue extends Controller
{
    public function __invoke($id): JsonResponse
    {
        app(AttributeValueRepositoryInterface::class)->destroy($id);
        return ApiResponse::success(
            'attribute value deleted successfully'
        );
    }
}
