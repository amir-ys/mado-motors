<?php

namespace App\Http\Controllers\User\Product;

use App\Contracts\ProductDetailRepositoryInterface;
use App\Contracts\UserRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\Agent\Product\TransferProductDetailOwnerRequest;
use App\Http\Resources\ProductDetailResource;
use App\Utilities\ApiResponse;
use Illuminate\Http\JsonResponse;

class TransferProduct extends Controller
{
    public function __invoke(
        TransferProductDetailOwnerRequest $transferProductDetailOwnerRequest,
        UserRepositoryInterface           $userRepository,
    ): JsonResponse
    {
        $data = $transferProductDetailOwnerRequest->validated();
        $data['owner_id'] = $userRepository->findByMobile($transferProductDetailOwnerRequest->owner_mobile)?->id;
        return ApiResponse::success(
            ProductDetailResource::make(
                app(ProductDetailRepositoryInterface::class)->TransferOwner(
                    $data
                )
            )
        );
    }
}