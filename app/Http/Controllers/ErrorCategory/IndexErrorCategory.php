<?php

namespace App\Http\Controllers\ErrorCategory;

use App\Contracts\ErrorCategoryRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Http\Resources\ErrorCategoryResource;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class IndexErrorCategory extends Controller
{
    public function __invoke(): AnonymousResourceCollection
    {
        return ErrorCategoryResource::collection(
            app( ErrorCategoryRepositoryInterface::class )->index()
        );
    }

    public function index(): AnonymousResourceCollection
    {
        return ErrorCategoryResource::collection(
            app( ErrorCategoryRepositoryInterface::class )->indexOnline()
        );
    }

    public function All(): AnonymousResourceCollection
    {
        return ErrorCategoryResource::collection(
            app( ErrorCategoryRepositoryInterface::class )->all()
        );
    }
}
