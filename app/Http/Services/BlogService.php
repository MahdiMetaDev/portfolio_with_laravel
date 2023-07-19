<?php

namespace App\Http\Services;

use App\Http\Requests\BlogRequest;
use App\Http\Resources\BlogResource;
use App\Interfaces\Blog\BlogRepositoryInterface;
use App\Models\Blog;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Resources\Json\JsonResource;

class BlogService
{
    public function __construct(
        private readonly BlogRepositoryInterface $repository,
        private readonly ImageService            $imageService,
    )
    {
    }

    public function index(BlogRequest $request)
    {
        return $this->repository->all($request->validated());
    }

    public function show(Blog $blog): Model
    {
        return $this->repository->find($blog->id);
    }

    public function store(array $payload = []): Model
    {
        $blog = $this->repository->store($payload);

        $this->imageService->store($payload['image'], $blog);

        return $blog;
    }

    public function update($model, array $payload = []): Model
    {
        $blog = $this->repository->update($model, $payload);

        $this->imageService->update($payload['image'], $blog);

        return $blog;
    }

    public function delete($model): bool
    {
        return $this->repository->delete($model);
    }
}
