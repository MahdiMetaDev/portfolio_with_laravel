<?php

namespace App\Http\Services;


use App\Interfaces\City\CityRepositoryInterface;
use App\Models\City;
use App\Models\Country;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class CityService
{
    public function __construct(private readonly CityRepositoryInterface $repository)
    {
    }

    public function index(array $payload=[]): Collection

    {
        return $this->repository->all($payload);
    }

    public function show(City $city): Model
    {
        return $this->repository->find($city->id);
    }

    public function store(array $payload = []): Model
    {
        return $this->repository->store($payload);
    }

    public function update($model, array $payload = []): Model
    {
        return $this->repository->update($model, $payload);
    }

    public function delete($model): bool
    {
        return $this->repository->delete($model);
    }
}
