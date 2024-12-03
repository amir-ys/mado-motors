<?php

namespace App\Http\Controllers\Admin\City;

use App\Contracts\Repositories\CityRepositoryInterface;
use App\Http\Controllers\Controller;
use App\Http\Resources\CityResource;
use App\Models\City;

class ShowCity extends Controller
{
    public function __invoke(City $city): CityResource
    {
        $city = app(CityRepositoryInterface::class)->show($city->id);
        return new CityResource($city);
    }
}
