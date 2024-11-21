<?php

namespace App\Http\Controllers\User;

use App\Contracts\UserRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class IndexUser extends Controller
{
    public function __invoke(): AnonymousResourceCollection
    {
        dd('dd');
        return UserResource::collection(
            app(UserRepositoryInterface::class)->index()
        );
    }

}
