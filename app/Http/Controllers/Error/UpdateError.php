<?php

namespace App\Http\Controllers\Error;

use App\Contracts\ErrorRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\Error\UpdateErrorRequest;
use App\Http\Resources\ErrorResource;
use App\Models\Error;

class UpdateError extends Controller
{
    public function __invoke( Error $error , UpdateErrorRequest $updateErrorRequest ): ErrorResource
    {
        return ErrorResource::make(
            app( ErrorRepositoryInterface::class )->update(
                $updateErrorRequest->validated(),
                $error->id
            )
        );
    }
}
