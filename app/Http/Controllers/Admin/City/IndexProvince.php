<?php

namespace App\Http\Controllers\Admin\City;

use App\Contracts\Repositories\CityRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Http\Resources\CityResource;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class IndexProvince extends Controller
{
    public function __invoke(): AnonymousResourceCollection
    {
        $cities = app(CityRepositoryInterface::class)->indexProvince();

        return CityResource::collection($cities);
    }
}
