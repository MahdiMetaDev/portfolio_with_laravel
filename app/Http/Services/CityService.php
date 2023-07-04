<?php

namespace App\Http\Services;


use App\Models\City;

class CityService extends BaseService
{
    public function __construct(City $city)
    {
        parent::__construct($city);
    }
}
