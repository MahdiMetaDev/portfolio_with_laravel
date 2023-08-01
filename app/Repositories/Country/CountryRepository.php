<?php

namespace App\Repositories\Country;

use App\Interfaces\Country\CountryRepositoryInterface;
use App\Models\Country;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

class CountryRepository extends BaseRepository implements CountryRepositoryInterface
{
    public function __construct(Country $country)
    {
        parent::__construct($country);
    }
}
