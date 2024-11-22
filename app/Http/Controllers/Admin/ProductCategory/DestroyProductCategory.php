<?php

namespace App\Http\Controllers\Admin\ProductCategory;

use App\Contracts\ProductCategoryRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Utilities\ApiResponse;
use Illuminate\Http\JsonResponse;

class DestroyProductCategory extends Controller
{
    public function __invoke($id): JsonResponse
    {
        app(ProductCategoryRepositoryInterface::class)->destroy($id);
        return ApiResponse::success(
            'category deleted successfully'
        );
    }
}
