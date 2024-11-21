<?php

namespace App\Repositories;

use App\Contracts\ErrorCategoryRepositoryInterface;
use App\Models\ErrorBrand;
use App\Models\ErrorCategory;
use App\Services\Media\MediaHelper;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class ErrorCategoryRepository implements ErrorCategoryRepositoryInterface
{
    public function all()
    {
        return ErrorCategory::filtered()->get();
    }

    public function index()
    {
        return ErrorCategory::with("main_image")->filtered()->paginate();
    }

    public function indexOnline(): LengthAwarePaginator
    {
        return ErrorCategory::with(['errors.errorBrand'])->paginate();
    }

    public function show(int $errorCategoryId)
    {
        $errorCategory = ErrorCategory::findOrFail($errorCategoryId);
        $errorCategory->load(['errors.errorBrand', 'main_image', 'media']);
        return $errorCategory;
    }

    public function showOnline(int $errorCategoryId)
    {
        $errorCategory = ErrorCategory::findOrFail($errorCategoryId);

        $errorCategory->load(["errors.errorBrand", "errors.errorItems", "errors.errorItems.errorCodes", "media", "main_image"]);
        return $errorCategory;
    }

    public function store(array $data)
    {
        $errorCategory = ErrorCategory::query()->create($data);

        MediaHelper::storeMediaFor($errorCategory);

        $errorCategory->load(["errors.errorBrand", "main_image"]);
        return $errorCategory;
    }

    public function update(array $data, int $errorCategoryId)
    {
        $errorCategory = ErrorCategory::findOrFail($errorCategoryId);
        $errorCategory->update($data);

        MediaHelper::storeMediaFor($errorCategory);

        $errorCategory->load(["errors.errorBrand", "main_image"]);
        return $errorCategory;
    }

    public function destroy(int $errorCategoryId)
    {
        $errorCategory = ErrorCategory::with("errors.errorBrand", 'errors.errorItems', 'errors.errorItems.errorCodes')->findOrFail($errorCategoryId);
        return $errorCategory->delete();
    }
}
