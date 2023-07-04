<?php

namespace App\Http\Services;

use App\Models\Country;
use Illuminate\Database\Eloquent\Model;

class CountryService extends BaseService
{
    public function __construct(Country $country)
    {
        parent::__construct($country);
    }
}
