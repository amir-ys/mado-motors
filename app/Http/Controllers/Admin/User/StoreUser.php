<?php

namespace App\Http\Controllers\Admin\User;

use App\Contracts\UserRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Resources\UserResource;

class StoreUser extends Controller
{
    public function __invoke(RegisterRequest $request): UserResource
    {
        return UserResource::make(
            app(UserRepositoryInterface::class)->store($request->validated())
        );
    }

}
