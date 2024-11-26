<?php

namespace App\Http\Controllers\Admin\Cart;

use App\Contracts\CartRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Http\Resources\CartResource;
use App\Utilities\ApiResponse;
use Illuminate\Http\JsonResponse;

class IndexCart extends Controller
{
    public function __invoke(): JsonResponse
    {
        return ApiResponse::success(
            CartResource::collection(
                app(CartRepositoryInterface::class)
                    ->with(['user', 'items'])
                    ->index()
            )
        );
    }
}
