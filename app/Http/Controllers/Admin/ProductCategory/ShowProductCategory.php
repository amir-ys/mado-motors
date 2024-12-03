<?php

namespace App\Http\Controllers\Admin\ProductCategory;

use App\Contracts\Repositories\ProductCategoryRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProductCategoryResource;
use App\Utilities\ApiResponse;
use Illuminate\Http\JsonResponse;

class ShowProductCategory extends Controller
{
    public function __invoke($id): JsonResponse
    {
        return ApiResponse::success(
            ProductCategoryResource::make(
                app(ProductCategoryRepositoryInterface::class)
                    ->with(['parent', 'children'])
                    ->find($id)
            )
        );
    }
}
