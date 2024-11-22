<?php

namespace App\Http\Controllers\Admin\ProductCategory;

use App\Contracts\ProductCategoryRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Models\ProductCategory;
use App\Services\Responser;
use Illuminate\Http\JsonResponse;

class DestroyProductCategory extends Controller
{
    public function __invoke(ProductCategory $productCategory): JsonResponse
    {
        app(ProductCategoryRepositoryInterface::class)->destroy($productCategory->id);
        return response()->json(Responser::success());
    }
}
