<?php

namespace App\Http\Controllers\ErrorItem;

use App\Contracts\ErrorItemsRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\ErrorItem\CreateErrorItemRequest;
use App\Http\Resources\ErrorItemResource;

class StoreErrorItem extends Controller
{
    public function __invoke(CreateErrorItemRequest $createErrorItemRequest): ErrorItemResource
    {
        return ErrorItemResource::make(
            app(ErrorItemsRepositoryInterface::class)->store(
                $createErrorItemRequest->validated()
            )
        );
    }
}
