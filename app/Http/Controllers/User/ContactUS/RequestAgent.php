<?php

namespace App\Http\Controllers\User\ContactUS;

use App\Contracts\Repositories\AgentRepositoryInterface;
use App\Contracts\Repositories\UserRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\Contact\StoreAgentRequestRequest;
use App\Models\Agent;
use App\Repositories\UserAddressRepository;
use App\Utilities\ApiResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

class RequestAgent extends Controller
{
    public function __invoke(StoreAgentRequestRequest $request): JsonResponse
    {
        DB::transaction(function () {

            $user = app(UserRepositoryInterface::class)->store(
                $request->only(['first_name', 'last_name', 'mobile', 'national_code', 'phone'])
            );

            $address = app(UserAddressRepository::class)->create(
                array_merge(['user_id' => $user->id], $request->only(['city_id', 'address', 'postal_code']))
            );

            $code = Agent::generateUniqueCode();
            app(AgentRepositoryInterface::class)->create(
                [
                    'user_id' => $user->id,
                    'address_id' => $address->id,
                    'code' => $code,
                ]
            );
        });

        return ApiResponse::success(
            data: [],
            message: "agents request added",
        );
    }
}
