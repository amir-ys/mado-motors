<?php

namespace App\Http\Controllers\Admin\Order;

use App\Contracts\OrderRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Http\Resources\OrderResource;
use App\Utilities\ApiResponse;
use Illuminate\Http\JsonResponse;

class ShowOrder extends Controller
{
    public function __invoke($id): JsonResponse
    {
        return ApiResponse::success(
            OrderResource::make(
                app(OrderRepositoryInterface::class)
                    ->orderDetails($id)
            )
        );
    }
}
