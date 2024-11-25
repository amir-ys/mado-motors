<?php

namespace App\Http\Controllers\Admin\User;

use App\Contracts\UserRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\StoreUserRequest;
use App\Http\Resources\UserResource;
use App\Utilities\ApiResponse;
use Illuminate\Http\JsonResponse;

class StoreUser extends Controller
{
    public function __invoke(StoreUserRequest $request): JsonResponse
    {
        return ApiResponse::created(
            UserResource::make(
                app(UserRepositoryInterface::class)->store($request->validated())
            )
        );
    }

}
