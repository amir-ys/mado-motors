<?php

namespace App\Http\Controllers\Admin\User;

use App\Contracts\Repositories\UserRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Utilities\ApiResponse;
use Illuminate\Http\JsonResponse;

class DestroyUser extends Controller
{

    public function __invoke($id): JsonResponse
    {
        app(UserRepositoryInterface::class)->destroy($id);

        return ApiResponse::success(
            'user deleted successfully'
        );
    }
}
