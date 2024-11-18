<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Contracts\CategoryRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\Category\StoreCategoryRequest;
use App\Http\Requests\Category\UpdateCategoryRequest;
use App\Http\Resources\CategoryResource;
use App\Utilities\ApiResponse;
use Illuminate\Http\JsonResponse;

class CategoryController extends Controller
{

    public function __construct(protected CategoryRepositoryInterface $categoryRepository)
    {

    }

    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $categories = $this->categoryRepository->with(['parent', 'children'])->paginate();

        return ApiResponse::success(
            CategoryResource::collection($categories)
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request): JsonResponse
    {
        $data = $request->validated();
        $category = $this->categoryRepository->create($data);

        return ApiResponse::created(
            new CategoryResource($category),
            'category created successfully'
        );
    }

    /**
     * Display the specified resource.
     */
    public function show($id): JsonResponse
    {
        $category = $this->categoryRepository->with(['parent', 'children'])->find($id);

        return ApiResponse::success(new CategoryResource($category));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, $id): JsonResponse
    {
        $data = $request->validated();
        $category = $this->categoryRepository->update($data, $id);

        return ApiResponse::success(
            new CategoryResource($category),
            'category updated successfully'
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $this->categoryRepository->delete($id);

        return ApiResponse::success(
            'category deleted successfully'
        );
    }
}
