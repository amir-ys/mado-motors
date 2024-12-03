<?php

namespace App\Http\Controllers\User\Address;

use App\Contracts\Repositories\UserAddressRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\Address\AddressRequest;
use App\Http\Resources\UserAddressResource;
use App\Utilities\ApiResponse;
use Illuminate\Http\JsonResponse;

class UpdateAddress extends Controller
{
    public function __invoke($id, AddressRequest $request): JsonResponse
    {
        return ApiResponse::success(
            UserAddressResource::make(
                app(UserAddressRepositoryInterface::class)->update(
                    $request->validated(),
                    $id
                )
            )
        );
    }
}
