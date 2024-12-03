<?php

namespace App\Http\Controllers\Admin\Product\Assign;

use App\Contracts\Repositories\ProductDetailRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProductDetail\StoreProductDetailRequest;
use App\Http\Resources\ProductDetailResource;
use App\Utilities\ApiResponse;
use Illuminate\Http\JsonResponse;

class StoreProductDetail extends Controller
{
    public function __invoke(
        StoreProductDetailRequest $storeProductDetail
    ): JsonResponse
    {

        $record = app(ProductDetailRepositoryInterface::class)
            ->checkExists($storeProductDetail->validated());

        if ($record) {
            return ApiResponse::error(
                message: "item exits in product details"
            );
        }

        return ApiResponse::success(
            ProductDetailResource::make(
                app(ProductDetailRepositoryInterface::class)->store(
                    $storeProductDetail->validated(),
                )
            )
        );
    }
}
