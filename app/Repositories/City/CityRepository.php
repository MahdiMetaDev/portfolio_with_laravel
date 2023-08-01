<?php

namespace App\Repositories\City;

use App\Interfaces\City\CityRepositoryInterface;
use App\Models\City;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

class CityRepository extends BaseRepository implements CityRepositoryInterface
{
    public function __construct(City $city)
    {
        parent::__construct($city);
    }
}
