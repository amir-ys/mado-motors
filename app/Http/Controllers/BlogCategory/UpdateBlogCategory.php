<?php

namespace App\Http\Controllers\BlogCategory;

use App\Contracts\BlogCategoryRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\BlogCategory\UpdateBlogCategoryRequest;
use App\Http\Resources\BlogCategoryResource;
use App\Models\BlogCategory;

class UpdateBlogCategory extends Controller
{
    public function __invoke(BlogCategory $blogCategory, UpdateBlogCategoryRequest $updateBlogCategoryRequest): BlogCategoryResource
    {
        return BlogCategoryResource::make(
            app(BlogCategoryRepositoryInterface::class)->update(
                $updateBlogCategoryRequest->validated(),
                $blogCategory->id
            )
        );
    }
}
