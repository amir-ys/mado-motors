<?php

namespace App\Http\Controllers\Admin\Attribute;

use App\Contracts\Repositories\AttributeRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Http\Resources\AttributeResource;
use App\Utilities\ApiResponse;
use Illuminate\Http\JsonResponse;

class IndexAttribute extends Controller
{
    public function __invoke(): JsonResponse
    {
        return ApiResponse::success(
            AttributeResource::collection(
                app(AttributeRepositoryInterface::class)->index()
            )
        );
    }
}
