<?php

namespace App\Http\Controllers\ErrorCategory;

use App\Http\Controllers\Controller;
use App\Models\ErrorCategory;
use App\Repositories\ErrorCategoryRepository;
use App\Services\Responser;
use Illuminate\Http\JsonResponse;

class DestroyErrorCategory extends Controller
{
    public function __invoke( ErrorCategory $errorCategory ): JsonResponse
    {
        app( ErrorCategoryRepository::class )->destroy( $errorCategory->id );
        return response()->json( Responser::success() );
    }
}
