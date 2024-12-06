<?php

namespace App\Http\Controllers\Auth;

use App\Contracts\Repositories\UserRepositoryInterface;
use App\Enums\UserRoleEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Utilities\ApiResponse;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Http;

class RegisterController extends Controller
{
    public function __construct(protected UserRepositoryInterface $userRepository)
    {

    }

    /**
     * @throws ConnectionException
     */
    public function store(RegisterRequest $request): JsonResponse
    {
        $data = $request->validated();

        $user = $this->userRepository->create(
            $data
        );
        $user->assignRole(UserRoleEnum::USER->value);

        $response = Http::asForm()->post(config('app.url') . '/oauth/token', [
            'grant_type' => 'password',
            'client_id' => config('passport.personal_access_client.id'),
            'client_secret' => config('passport.personal_access_client.secret'),
            'username' => $data['mobile'],
            'password' => $data['password'],
            'scope' => '*',
        ]);
        $user['token'] = $response->json();

        return ApiResponse::success(
            data: $user,
            message: 'user created successfully'
        );
    }
}
