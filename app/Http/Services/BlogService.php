<?php

namespace App\Http\Services;

use App\Http\Requests\BlogRequest;
use App\Http\Resources\BlogResource;
use App\Interfaces\Blog\BlogRepositoryInterface;
use App\Models\Blog;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\DB;

class BlogService
{
    public function __construct(
        private readonly BlogRepositoryInterface $repository,
        private readonly ImageService            $imageService,
    )
    {
    }

    public function index(array $payload): Collection
    {
        return $this->repository->all($payload);
    }

    public function show(Blog $blog): Model
    {
        return $this->repository->find($blog->id);
    }

    public function store(array $payload = []): Model
    {
        DB::transaction(function () use ($payload) {
            $blog = $this->repository->store($payload);
            $this->imageService->store($payload['image'], $blog);
            return $blog;
        });
    }

    public function update($model, array $payload = []): Model
    {
        DB::transaction(function () use ($model, $payload) {
            $blog = $this->repository->update($model, $payload);
            $this->imageService->update($payload['image'], $blog);
            return $blog;
        });
    }

    public function delete($model): bool
    {
        DB::transaction(function () use ($model) {
            return $this->repository->delete($model);
        });
    }
}
