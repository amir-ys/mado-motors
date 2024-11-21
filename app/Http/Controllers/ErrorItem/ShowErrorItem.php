<?php

namespace App\Http\Controllers\ErrorItem;

use App\Contracts\ErrorItemsRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Http\Resources\ErrorItemResource;
use App\Models\ErrorItem;

class ShowErrorItem extends Controller
{
    public function __invoke( ErrorItem $errorItem ): ErrorItemResource
    {
        return ErrorItemResource::make(
            app( ErrorItemsRepositoryInterface::class )->show( $errorItem->id )
        );
    }

    public function show( ErrorItem $errorItem ): ErrorItemResource
    {
        return ErrorItemResource::make(
            app( ErrorItemsRepositoryInterface::class )->showOnline( $errorItem->id )
        );
    }
}
