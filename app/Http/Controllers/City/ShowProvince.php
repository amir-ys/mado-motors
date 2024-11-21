<?php

namespace App\Http\Controllers\City;

use App\Contracts\CityRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Http\Resources\CityResource;

class ShowProvince extends Controller
{
    public function __invoke($province): CityResource
    {
        $cities = app(CityRepositoryInterface::class)->showProvince($province);
        return CityResource::make($cities);
    }
}
