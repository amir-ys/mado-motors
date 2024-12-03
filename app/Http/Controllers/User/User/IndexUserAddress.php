<?php

namespace App\Http\Controllers\User\User;

use App\Contracts\Repositories\UserAddressRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserAddressResource;
use App\Utilities\ApiResponse;
use Illuminate\Http\JsonResponse;

class IndexUserAddress extends Controller
{

    public function __invoke(): JsonResponse
    {
        return ApiResponse::success(
            UserAddressResource::collection(
                app(UserAddressRepositoryInterface::class)
                    ->getByUserId(auth()->id())
            )
        );
    }
}
