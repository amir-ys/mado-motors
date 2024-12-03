<?php

namespace App\Http\Controllers\Admin\Order;

use App\Contracts\Repositories\OrderRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Utilities\ApiResponse;
use Illuminate\Http\JsonResponse;

class DestroyOrder extends Controller
{
    public function __invoke($id): JsonResponse
    {
        app(OrderRepositoryInterface::class)->destroy($id);
        return ApiResponse::success(
            'order deleted successfully'
        );
    }
}
