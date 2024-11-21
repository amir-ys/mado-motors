<?php

namespace App\Repositories;

use App\Contracts\BlogRepositoryInterface;
use App\Models\Blog;
use App\Services\Media\MediaHelper;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class BlogRepository implements BlogRepositoryInterface
{
    public function destroy($blogId)
    {
        $blog = Blog::findOrFail($blogId);
        return $blog->delete();
    }

    public function index()
    {
        return Blog::filtered()->with(["category", "main_image", "creator"])->paginate();
    }

    public function indexOnline(): LengthAwarePaginator
    {
        return Blog::filtered()->with(["category", "main_image", "creator"])->paginate();
    }

    public function show($blogId)
    {
        $blog = Blog::findOrFail($blogId);
        $blog->load(["category", "main_image", "creator", "media"]);
        return $blog;
    }

    public function similarBlogs($blogId)
    {
        $blog = Blog::findOrFail($blogId);
        $blogCategoryId = $blog->category ? $blog->category->id : 0;
        $similarBlogs = Blog::query()
            ->where("id", "<>", $blogId)
            ->where("category_id", $blogCategoryId)
            ->with(["category", "main_image", "creator"])
            ->get();
        if (!$similarBlogs->isEmpty()) {
            $similarBlogsCount = $similarBlogs->count();
            $similarSelectedBlogsCount = min($similarBlogsCount, 8);
            return $similarBlogs->random($similarSelectedBlogsCount);
        } else {
            return $similarBlogs;
        }
    }

    public function showOnline($blogId)
    {
        $blog = Blog::findOrFail($blogId);
        $blog->load(["category", "main_image", "creator", "media"]);
        return $blog;
    }

    public function store($data): Model|Builder
    {
        $blog = Blog::query()->create($data);

        MediaHelper::storeMediaFor($blog);

        $blog->load(["category", "main_image", "creator"]);
        return $blog;
    }

    public function update(array $data, int $blogId)
    {
        $blog = Blog::findOrFail($blogId);
        $blog->update($data);

        MediaHelper::storeMediaFor($blog);

        $blog->load(["category", "main_image", "creator"]);
        return $blog;
    }

    public function changeActive(int $blogId)
    {
        $blog = Blog::findOrFail($blogId);
        $blog->is_active = !$blog->is_active;
        $blog->save();

        $blog->load(["category", "main_image", "creator"]);
        return $blog;
    }
}
