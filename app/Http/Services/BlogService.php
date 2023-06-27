<?php

namespace App\Http\Services;

use App\Http\Resources\BlogResource;
use App\Models\Blog;

class BlogService extends BaseService
{
    public function __construct(Blog $blog)
    {
        parent::__construct($blog);
    }

    public function show(Blog $blog)
    {
        return BlogResource::make($blog);
    }
}
