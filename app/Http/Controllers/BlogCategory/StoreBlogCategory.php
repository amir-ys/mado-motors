<?php

namespace App\Http\Controllers\BlogCategory;

use App\Contracts\BlogCategoryRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\BlogCategory\CreateBlogCategoryRequest;
use App\Http\Resources\BlogCategoryResource;

class StoreBlogCategory extends Controller
{
    public function __invoke(CreateBlogCategoryRequest $createBlogCategoryRequest): BlogCategoryResource
    {
        return BlogCategoryResource::make(
            app(BlogCategoryRepositoryInterface::class)->store(
                $createBlogCategoryRequest->validated()
            )
        );
    }
}
