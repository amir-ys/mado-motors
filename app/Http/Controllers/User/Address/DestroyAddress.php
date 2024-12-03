<?php

namespace App\Http\Controllers\User\Address;

use App\Contracts\Repositories\UserAddressRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Utilities\ApiResponse;
use Illuminate\Http\JsonResponse;

class DestroyAddress extends Controller
{
    public function __invoke($id): JsonResponse
    {
        app(UserAddressRepositoryInterface::class)->destroyByIdAndUserId($id, auth()->id());
        return ApiResponse::success(
            'address deleted successfully'
        );
    }
}
