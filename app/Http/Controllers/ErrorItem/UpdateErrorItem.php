<?php

namespace App\Http\Controllers\ErrorItem;

use App\Contracts\ErrorItemsRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\ErrorItem\UpdateErrorItemRequest;
use App\Http\Resources\ErrorItemResource;
use App\Models\ErrorItem;

class UpdateErrorItem extends Controller
{
    public function __invoke( ErrorItem $errorItem , UpdateErrorItemRequest $updateErrorItemRequest ): ErrorItemResource
    {
        return ErrorItemResource::make(
            app( ErrorItemsRepositoryInterface::class )->update(
                $updateErrorItemRequest->validated(),
                $errorItem->id
            )
        );
    }
}
