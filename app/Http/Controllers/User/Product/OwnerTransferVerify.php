<?php

namespace App\Http\Controllers\User\Product;

use App\Contracts\Repositories\ProductDetailRepositoryInterface;
use App\Contracts\Repositories\UserRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\Product\TransferProductDetailOwnerVerifyRequest;
use App\Http\Resources\ProductDetailResource;
use App\Utilities\ApiResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Cache;

class OwnerTransferVerify extends Controller
{
    public function __invoke(
        TransferProductDetailOwnerVerifyRequest $request,
        UserRepositoryInterface                 $userRepository,
        ProductDetailRepositoryInterface        $productDetailRepository,
    ): JsonResponse
    {
        $data = $request->validated();

        $codeKey = "user:transfer_owner:" . $request->id . '_' . $request->owner_mobile . '_' . $request->owner_notional_code;
        $code = Cache::get($codeKey);

        if ($request->code != $code) {
            return ApiResponse::error(
                'The code entered is not valid'
            );
        }
        $data['owner_id'] = $userRepository->findByMobile($request->owner_mobile)?->id;

        ProductDetailResource::make(
            app(ProductDetailRepositoryInterface::class)->TransferOwner(
                $data
            )
        );

        Cache::forget($codeKey);
        return ApiResponse::success(
            $data = [],
            message: "product detail owner changed successfully"
        );
    }
}
