<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Services\Responser;
use App\Services\UserVerifier;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class VerifyRegister extends Controller
{
    public function __invoke(Request $request): JsonResponse
    {
        $this->validate($request, [
            'code' => 'required'
        ]);

        if ($user = UserVerifier::verifyUser($request->code)) {
            $token = $user->createToken('Personal Client')->accessToken;
            return response()->json(Responser::data(
                ['token' => $token, 'user' => new UserResource($user)]
            ), 200);
        }

        return response()->json(Responser::error([trans('messages.invalid_code')]), 422);
    }
}