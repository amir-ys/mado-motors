<?php

namespace App\Http\Controllers\Admin\User;

use App\Contracts\Repositories\UserRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\SendSmsToUserRequest;
use App\Utilities\ApiResponse;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;

class SendSmsToUser extends Controller
{
    public function __invoke(
        $id,
        SendSmsToUserRequest $request,
        UserRepositoryInterface $userRepository
    ): JsonResponse
    {
        $user = $userRepository->find($id);
        if (!$user) {
            return throw new ModelNotFoundException('user not found');
        }

        $data = $request->validated();
        #todo send sms

        return ApiResponse::success(
            data: [],
            message: 'sms sent to user successfully'
        );
    }

}
