<?php

namespace App\Http\Controllers\User\Address;

use App\Contracts\Repositories\UserAddressRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\Address\AddressRequest;
use App\Http\Resources\UserAddressResource;
use App\Utilities\ApiResponse;
use Illuminate\Http\JsonResponse;

class StoreAddress extends Controller
{
    public function __invoke(AddressRequest $request): JsonResponse
    {
        $data = $request->validated();
        $data['user_id'] = auth()->id();
        return ApiResponse::created(
            UserAddressResource::make(
                app(UserAddressRepositoryInterface::class)->create(
                    $data
                )
            )
        );
    }
}
