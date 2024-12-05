<?php

namespace App\Http\Controllers\User\User;

use App\Contracts\Repositories\UserAddressRepositoryInterface;
use App\Contracts\Repositories\UserRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\User\UpdateUserRequest;
use App\Http\Resources\UserResource;
use App\Utilities\ApiResponse;
use Illuminate\Http\JsonResponse;

class ShowUser extends Controller
{

    public function __invoke(): JsonResponse
    {
        return ApiResponse::success(
            UserResource::make(
                app(UserRepositoryInterface::class)
                    ->with(['mainAddress'])
                    ->find(auth()->id())
            )
        );
    }
}
