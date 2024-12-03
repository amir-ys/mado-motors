<?php

namespace App\Http\Controllers\Admin\ProductCategory;

use App\Contracts\Repositories\ProductCategoryRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProductCategoryResource;
use App\Utilities\ApiResponse;
use Illuminate\Http\JsonResponse;

class IndexProductCategory extends Controller
{
    public function __invoke(): JsonResponse
    {
        return ApiResponse::success(
            ProductCategoryResource::collection(
                app(ProductCategoryRepositoryInterface::class)->index()
            )
        );
    }
}
