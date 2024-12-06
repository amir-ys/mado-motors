<?php

namespace App\Http\Controllers\User\Product;

use App\Contracts\Repositories\UserRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\Product\TransferProductDetailOwnerRequest;
use App\Utilities\ApiResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Cache;

class OwnerTransferRequest extends Controller
{
    public function __invoke(
        TransferProductDetailOwnerRequest $request,
        UserRepositoryInterface           $userRepository
    ): JsonResponse
    {
        $newOwner = $userRepository->findWhere([
            'mobile' => $request->owner_mobile,
            'national_code' => $request->owner_notional_code
        ]);

        if ($newOwner->count() == 0) {
            return ApiResponse::error(
                'The new owner information is incorrect'
            );
        }

        $otpCode = random_int(100000, 999999);
        $key = "user:transfer_owner:" . $request->id . '_' . $request->owner_mobile . '_' . $request->owner_notional_code;
        Cache::set($key, $otpCode);

        #todo send sms to user

        return ApiResponse::success(
            'OTP code has been sent to you'
        );
    }
}
