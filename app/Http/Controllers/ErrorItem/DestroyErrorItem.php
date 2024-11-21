<?php

namespace App\Http\Controllers\ErrorItem;

use App\Contracts\ErrorItemsRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Models\ErrorItem;
use App\Services\Responser;
use Illuminate\Http\JsonResponse;

class DestroyErrorItem extends Controller
{
    public function __invoke( ErrorItem $errorItem ): JsonResponse
    {
        app( ErrorItemsRepositoryInterface::class )->destroy( $errorItem->id );
        return response()->json( Responser::success() );
    }
}
