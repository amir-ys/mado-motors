<?php

namespace App\Http\Controllers\Error;

use App\Contracts\ErrorRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\Error\CreateErrorRequest;
use App\Http\Resources\ErrorResource;

class StoreError extends Controller
{
    public function __invoke( CreateErrorRequest $createErrorRequest ): ErrorResource
    {
        return ErrorResource::make(
            app( ErrorRepositoryInterface::class )->store(
                $createErrorRequest->validated()
            )
        );
    }
}
