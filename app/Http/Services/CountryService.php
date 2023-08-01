<?php

namespace App\Http\Services;

use App\Interfaces\Country\CountryRepositoryInterface;
use App\Models\Country;
use Illuminate\Database\Eloquent\Model;

class CountryService
{
    public function __construct(private readonly CountryRepositoryInterface $repository)
    {
    }

    public function index(array $payload=[])
    {
        return $this->repository->all($payload);
    }

    public function show(Country $country): Model
    {
        return $this->repository->find($country->id);
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
