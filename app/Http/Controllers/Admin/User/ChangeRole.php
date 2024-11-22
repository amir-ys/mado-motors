<?php

namespace App\Http\Controllers\Admin\User;

use App\Contracts\UserRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;

class ChangeRole extends Controller
{

    public function __invoke(User $user): UserResource
    {
        return UserResource::make(
            app(UserRepositoryInterface::class)->changeRole($user->id)
        );
    }

}
