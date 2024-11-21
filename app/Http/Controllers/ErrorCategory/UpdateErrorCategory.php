<?php

namespace App\Http\Controllers\ErrorCategory;

use App\Contracts\ErrorCategoryRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\ErrorCategory\UpdateErrorCategoryRequest;
use App\Http\Resources\ErrorCategoryResource;
use App\Models\ErrorCategory;


class UpdateErrorCategory extends Controller
{
    public function __invoke( ErrorCategory $errorCategory , UpdateErrorCategoryRequest $updateErrorCategoryRequest)
    {
        return ErrorCategoryResource::make(
            app(ErrorCategoryRepositoryInterface::class)->update(
                $updateErrorCategoryRequest->validated(),
                $errorCategory->id
            )
        );
    }
}
