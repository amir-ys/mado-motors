<?php

namespace App\Http\Controllers\ErrorBrand;

use App\Contracts\ErrorBrandRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\ErrorBrand\UpdateErrorBrandRequest;
use App\Http\Resources\ErrorBrandResource;
use App\Models\ErrorBrand;

class UpdateErrorBrand extends Controller
{
    public function __invoke(ErrorBrand $errorBrand, UpdateErrorBrandRequest $updateErrorBrandRequest): ErrorBrandResource
    {
        return ErrorBrandResource::make(
            app(ErrorBrandRepositoryInterface::class)->update(
                $updateErrorBrandRequest->validated(),
                $errorBrand->id
            )
        );
    }
}
