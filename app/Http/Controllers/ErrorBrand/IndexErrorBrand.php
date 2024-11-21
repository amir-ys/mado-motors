<?php

namespace App\Http\Controllers\ErrorBrand;

use App\Contracts\ErrorBrandRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Http\Resources\ErrorBrandResource;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class IndexErrorBrand extends Controller
{
    public function __invoke()
    {
        return ErrorBrandResource::collection(
            app( ErrorBrandRepositoryInterface::class )->index()
        );
    }

    public function index(): AnonymousResourceCollection
    {
        return ErrorBrandResource::collection(
            app( ErrorBrandRepositoryInterface::class )->indexOnline()
        );
    }

    public function All(): AnonymousResourceCollection
    {
        return ErrorBrandResource::collection(
            app( ErrorBrandRepositoryInterface::class )->all()
        );
    }
}
