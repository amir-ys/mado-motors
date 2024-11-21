<?php

namespace App\Http\Controllers\ErrorBrand;

use App\Contracts\ErrorBrandRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Models\ErrorBrand;
use App\Services\Responser;
use Illuminate\Http\JsonResponse;

class DestroyErrorBrand extends Controller
{
    public function __invoke(ErrorBrand $errorBrand): JsonResponse
    {
        app(ErrorBrandRepositoryInterface::class)->destroy($errorBrand->id);
        return response()->json(Responser::success());
    }
}
