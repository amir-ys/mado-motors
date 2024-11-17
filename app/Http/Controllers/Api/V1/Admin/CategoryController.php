<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Contracts\CategoryRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
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
    public function show(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //
    }
}
