<?php

namespace App\Http\Controllers\ErrorBrand;

use App\Contracts\ErrorBrandRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\ErrorBrand\CreateErrorBrandRequest;
use App\Http\Resources\ErrorBrandResource;

class StoreErrorBrand extends Controller
{
    public function __invoke(CreateErrorBrandRequest $createErrorBrandRequest): ErrorBrandResource
    {
        return ErrorBrandResource::make(
            app(ErrorBrandRepositoryInterface::class)->store(
                $createErrorBrandRequest->validated()
            )
        );
    }
}
