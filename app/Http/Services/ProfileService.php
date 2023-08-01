<?php

namespace App\Http\Services;

use App\Interfaces\Profile\ProfileRepositoryInterface;
use App\Models\Country;
use App\Models\Profile;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class ProfileService
{
    public function __construct(private readonly ProfileRepositoryInterface $repository)
    {
    }

    public function index(array $payload=[]): Collection
    {
        return $this->repository->all($payload);
    }

    public function show(Profile $profile): Model
    {
        return $this->repository->find($profile->id);
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
