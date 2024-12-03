<?php

namespace App\Http\Controllers\Admin\City;

use App\Contracts\Repositories\CityRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Http\Resources\CityResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class IndexCity extends Controller
{
    public function __invoke(Request $request): AnonymousResourceCollection
    {
        $type = $request->input('type') ?? 1;
        $cities = app(CityRepositoryInterface::class)->index($type);
        return CityResource::collection($cities);
    }
}
