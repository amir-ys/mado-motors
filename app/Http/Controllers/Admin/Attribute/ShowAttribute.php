<?php

namespace App\Http\Controllers\Admin\Attribute;

use App\Contracts\AttributeRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Http\Resources\AttributeResource;
use App\Utilities\ApiResponse;
use Illuminate\Http\JsonResponse;

class ShowAttribute extends Controller
{
    public function __invoke($id): JsonResponse
    {
        return ApiResponse::success(
            AttributeResource::make(
                app(AttributeRepositoryInterface::class)
                    ->find($id)
            )
        );
    }
}
