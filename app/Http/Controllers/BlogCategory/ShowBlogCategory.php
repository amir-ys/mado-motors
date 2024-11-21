<?php

namespace App\Http\Controllers\BlogCategory;

use App\Contracts\BlogCategoryRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Http\Resources\BlogCategoryResource;
use App\Models\BlogCategory;

class ShowBlogCategory extends Controller
{
    public function __invoke( BlogCategory $blogCategory ): BlogCategoryResource
    {
        return BlogCategoryResource::make(
            app( BlogCategoryRepositoryInterface::class )->show( $blogCategory->id )
        );
    }

    public function show( BlogCategory $blogCategory ): BlogCategoryResource
    {
        return BlogCategoryResource::make(
            app( BlogCategoryRepositoryInterface::class )->show( $blogCategory->id )
        );
    }
}
