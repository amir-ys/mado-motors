<?php

namespace App\Http\Controllers\ErrorCategory;

use App\Contracts\ErrorCategoryRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\ErrorCategory\CreateErrorCategoryRequest;
use App\Http\Resources\ErrorCategoryResource;

class StoreErrorCategory extends Controller
{
    public function __invoke(CreateErrorCategoryRequest $createErrorCategoryRequest)
    {
        return ErrorCategoryResource::make(
            app(ErrorCategoryRepositoryInterface::class)->store(
                $createErrorCategoryRequest->validated()
            )
        );
    }
}
