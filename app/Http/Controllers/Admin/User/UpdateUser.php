<?php

namespace App\Http\Controllers\Admin\User;

use App\Contracts\UserRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\UpdateUserRequest;
use App\Http\Resources\UserResource;
use App\Utilities\ApiResponse;
use Illuminate\Http\JsonResponse;

class UpdateUser extends Controller
{

    public function __invoke($id, UpdateUserRequest $request): JsonResponse
    {
        return ApiResponse::success(
            UserResource::make(
                app(UserRepositoryInterface::class)
                    ->update($request->validated(), $id)
            )
        );
    }
}
