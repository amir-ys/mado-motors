<?php

namespace App\Http\Controllers\Admin\Product;

use App\Contracts\Repositories\ProductRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Utilities\ApiResponse;
use Illuminate\Http\JsonResponse;


class DestroyProduct extends Controller
{
    public function __invoke($id): JsonResponse
    {
        app(ProductRepositoryInterface::class)->destroy($id);

        return ApiResponse::success(
            data: [],
            message: 'product deleted successfully',
        );
    }
}
