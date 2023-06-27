<?php

namespace App\Http\Services;

use App\Http\Resources\BlogResource;
use App\Models\Blog;
use Illuminate\Http\Resources\Json\JsonResource;

class BlogService extends BaseService
{
    public function __construct(Blog $blog)
    {
        parent::__construct($blog);
    }

    public function show(Blog $blog): JsonResource
    {
        return BlogResource::make($blog);
    }
}
