<?php

namespace App\Http\Services;

use Illuminate\Database\Eloquent\Model;

class BaseService
{
    public function __construct(private readonly Model $model)
    {
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
}
