<?php

namespace App\Http\Controllers\ErrorBrand;

use App\Contracts\ErrorBrandRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Http\Resources\ErrorBrandResource;
use App\Models\ErrorBrand;

class ShowErrorBrand extends Controller
{
    public function __invoke(ErrorBrand $errorBrand)
    {
        return ErrorBrandResource::make(
            app( ErrorBrandRepositoryInterface::class )->show($errorBrand->id)
        );
    }

    public function showOnline(ErrorBrand $errorCategory)
    {
        return ErrorBrandResource::make(
            app( ErrorBrandRepositoryInterface::class )->showOnline($errorCategory->id)
        );
    }

}
