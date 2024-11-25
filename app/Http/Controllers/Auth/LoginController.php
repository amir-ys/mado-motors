<?php

namespace App\Http\Controllers\Auth;

use App\Contracts\UserRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Utilities\ApiResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;

class LoginController extends Controller
{
    public function __construct(protected UserRepositoryInterface $userRepository)
    {

    }

    public function store(LoginRequest $request): JsonResponse
    {
        $data = $request->validated();

        $user = $this->userRepository->findByMobile($data['mobile']);
        if (!$user || !Hash::check($data['password'], $user->password)) {
            return ApiResponse::unauthorized(
                'Invalid credentials. Please check your mobile and password and try again.'
            );
        }

        $response = Http::asForm()->post(config('app.url') . '/oauth/token', [
            'grant_type' => 'password',
            'client_id' => config('passport.personal_access_client.id'),
            'client_secret' => config('passport.personal_access_client.secret'),
            'username' => $data['mobile'],
            'password' => $data['password'],
            'scope' => '*',
        ]);
        $token = $response->json();

        return ApiResponse::success(
            data: [
                'token' => $token,
                'user' => auth()->user(),
            ],
            message: 'user logged in successfully'
        );
    }
}
