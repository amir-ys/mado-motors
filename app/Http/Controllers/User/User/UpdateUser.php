<?php

namespace App\Http\Controllers\User\User;

use App\Contracts\Repositories\UserAddressRepositoryInterface;
use App\Contracts\Repositories\UserRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\User\UpdateUserRequest;
use App\Http\Resources\UserResource;
use App\Utilities\ApiResponse;
use Illuminate\Http\JsonResponse;

class UpdateUser extends Controller
{

    public function __invoke(
        UpdateUserRequest $request,
    ): JsonResponse
    {
        $addressRepository = app(UserAddressRepositoryInterface::class);

        $addressData = [
            'user_id' => auth()->id(),
            'city_id' => $request->city_id,
            'address' => $request->address,
            'postal_code' => $request->postal_code,
        ];

        $userData = [
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'phone' => $request->phone,
        ];

        if (auth()->user()->main_address_id) {
            $addressRepository->update(
                attributes: $addressData,
                id: auth()->user()->main_address_id
            );
        } else {
            $address = $addressRepository->create($addressData);
            $userData['main_address_id'] = $address->id;
        }

        return ApiResponse::success(
            UserResource::make(
                app(UserRepositoryInterface::class)
                    ->updateProfile($userData, auth()->id())
            )
        );
    }
}
