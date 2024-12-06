<?php

namespace App\Contracts\Repositories;

interface CityRepositoryInterface extends BaseRepositoryInterface
{
    public function index($type);

    public function indexProvince();

    public function showProvince($cityId);

    public function show($cityId);
}
