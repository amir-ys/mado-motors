<?php

namespace App\Http\Controllers\Admin\User;

use App\Contracts\UserRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Utilities\ApiResponse;
use Illuminate\Http\JsonResponse;

class IndexUser extends Controller
{
    public function __invoke(): JsonResponse
    {
        return ApiResponse::success(
            UserResource::collection(
                app(UserRepositoryInterface::class)
                    ->with(['mainAddress'])
                    ->index()
            )
        );
    }

}
