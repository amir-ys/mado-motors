<?php

namespace App\Http\Controllers\Agent\Product;

use App\Contracts\Repositories\AgentRepositoryInterface;
use App\Contracts\Repositories\ProductDetailRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProductDetailResource;
use App\Utilities\ApiResponse;
use Illuminate\Http\JsonResponse;

class MyProduct extends Controller
{
    public function __invoke(AgentRepositoryInterface $agentRepository): JsonResponse
    {
        $agent = $agentRepository->findByUserId(auth()->id());

        if (!$agent) {
            return ApiResponse::error('agent not found');
        }

        return ApiResponse::success(
            ProductDetailResource::collection(
                app(ProductDetailRepositoryInterface::class)->getByAgentId(
                    agentId: $agent->id
                )
            )
        );
    }
}
