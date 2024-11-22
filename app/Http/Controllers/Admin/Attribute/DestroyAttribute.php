<?php

namespace App\Http\Controllers\Admin\Attribute;

use App\Contracts\AttributeRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Utilities\ApiResponse;
use Illuminate\Http\JsonResponse;

class DestroyAttribute extends Controller
{
    public function __invoke($id): JsonResponse
    {
        app(AttributeRepositoryInterface::class)->destroy($id);
        return ApiResponse::success(
            'attribute deleted successfully'
        );
    }
}
