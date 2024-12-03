<?php

namespace App\Http\Controllers\User\ContactUS;

use App\Contracts\Repositories\AgentRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Http\Resources\AgentResource;
use App\Utilities\ApiResponse;
use Carbon\CarbonInterval;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Cache;

class IndexAgents extends Controller
{
    public function __invoke(): JsonResponse
    {
        $data = Cache::remember(
            'agents',
            CarbonInterval::day()->totalSeconds,
            function () {
                return AgentResource::class::collection(
                    app(AgentRepositoryInterface::class)
                        ->with(['address'])
                        ->index()
                );
            }
        );

        return ApiResponse::success(
            data: $data
        );
    }
}
