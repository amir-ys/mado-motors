<?php

namespace App\Http\Controllers\Blog;

use App\Contracts\BlogRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Http\Resources\BlogResource;
use App\Models\Blog;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class IndexBlog extends Controller
{
    public function __invoke(): AnonymousResourceCollection
    {
        return BlogResource::collection(
            app( BlogRepositoryInterface::class )->index()
        );
    }

    public function index(): AnonymousResourceCollection
    {
        return BlogResource::collection(
            app( BlogRepositoryInterface::class )->indexOnline()
        );
    }

    public function similar( Blog $blog ): AnonymousResourceCollection
    {
        return BlogResource::collection(
            app( BlogRepositoryInterface::class )->similarBlogs( $blog->id )
        );
    }
}
