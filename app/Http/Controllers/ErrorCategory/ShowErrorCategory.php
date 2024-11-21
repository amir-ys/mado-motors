<?php

namespace App\Http\Controllers\ErrorCategory;

use App\Contracts\ErrorCategoryRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Http\Resources\ErrorCategoryResource;
use App\Models\ErrorCategory;

class ShowErrorCategory extends Controller
{
    public function __invoke(ErrorCategory $errorCategory)
    {
        return ErrorCategoryResource::make(
            app( ErrorCategoryRepositoryInterface::class )->show($errorCategory->id)
        );
    }

    public function showOnline(ErrorCategory $errorCategory)
    {
        return ErrorCategoryResource::make(
            app( ErrorCategoryRepositoryInterface::class )->showOnline($errorCategory->id)
        );
    }

}
