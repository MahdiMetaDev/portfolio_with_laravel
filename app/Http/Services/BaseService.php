<?php

namespace App\Http\Services;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class BaseService
{
    public function __construct(private readonly Model $model)
    {
    }

    public function index(): Collection
    {
        return $this->model->orderByDesc('id')->get();
    }

    public function store(array $payload = []): Model
    {
        return $this->model->create();
    }

    public function update($model, array $payload = []): Model
    {
        $model->update($payload);
        return $model;
    }

    public function delete($model): bool
    {
        return $model->delete();
    }
}
