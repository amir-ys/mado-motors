<?php

namespace App\Http\Controllers\Admin\Order;

use App\Contracts\OrderRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Order\UpdateOrderRequest;
use App\Http\Resources\OrderResource;
use App\Utilities\ApiResponse;
use Illuminate\Http\JsonResponse;

class UpdateOrder extends Controller
{
    public function __invoke($id, UpdateOrderRequest $updateOrderRequest): JsonResponse
    {
        return ApiResponse::success(
            OrderResource::make(
                app(OrderRepositoryInterface::class)->update(
                    $updateOrderRequest->validated(),
                    $id
                )
            )
        );
    }
}
