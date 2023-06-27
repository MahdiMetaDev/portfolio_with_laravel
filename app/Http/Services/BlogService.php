<?php

namespace App\Http\Services;

use App\Models\Blog;

class BlogService extends BaseService
{
    public function __construct(Blog $blog)
    {
        parent::__construct($blog);
    }
}
