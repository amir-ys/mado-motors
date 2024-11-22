<?php

namespace App\Http\Controllers\Admin\User;

use App\Contracts\UserRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Utilities\ApiResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class IndexUser extends Controller
{
    public function __invoke(): JsonResponse
    {
        return ApiResponse::success(
            UserResource::collection(
                app(UserRepositoryInterface::class)->index()
            )
        );
    }

}
