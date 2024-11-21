<?php

namespace App\Http\Controllers\ErrorItem;

use App\Contracts\ErrorItemsRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Http\Resources\ErrorItemResource;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class IndexErrorItem extends Controller
{
    public function __invoke(): AnonymousResourceCollection
    {
        return ErrorItemResource::collection(
            app(ErrorItemsRepositoryInterface::class)->index()
        );
    }

    public function index(): AnonymousResourceCollection
    {
        return ErrorItemResource::collection(
            app(ErrorItemsRepositoryInterface::class)->indexOnline()
        );
    }
}
