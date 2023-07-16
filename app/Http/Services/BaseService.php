<?php

namespace App\Http\Services;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class BaseService
{
    public function __construct(private readonly Model $model)
    {
    }

    public function index()
    {
        return $this->model->latest()->paginate(2);
    }

    public function store(array $payload = []): Model
    {
        return $this->model->create($payload);
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
