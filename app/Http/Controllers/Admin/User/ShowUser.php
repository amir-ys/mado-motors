<?php

namespace App\Http\Controllers\Admin\User;

use App\Contracts\Repositories\UserRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Utilities\ApiResponse;
use Illuminate\Http\JsonResponse;

class ShowUser extends Controller
{

    public function __invoke($id): JsonResponse
    {
        return ApiResponse::success(
            UserResource::make(
                app(UserRepositoryInterface::class)
                    ->with(['mainAddress' , 'roles'])
                    ->find($id)
            )
        );
    }
}
