<?php

namespace App\Http\Controllers\Admin\Order;

use App\Contracts\Repositories\OrderRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Http\Resources\OrderResource;
use App\Utilities\ApiResponse;
use Illuminate\Http\JsonResponse;

class IndexOrder extends Controller
{
    public function __invoke(): JsonResponse
    {
        return ApiResponse::success(
            OrderResource::collection(
                app(OrderRepositoryInterface::class)
                    ->with(['user', 'address'])
                    ->index()
            )
        );
    }
}
