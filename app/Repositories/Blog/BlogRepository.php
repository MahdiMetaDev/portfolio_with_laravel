<?php

namespace App\Repositories\Blog;

use App\Interfaces\Blog\BlogRepositoryInterface;
use App\Models\Blog;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

class BlogRepository extends BaseRepository implements BlogRepositoryInterface
{
    public function __construct(Blog $blog)
    {
        parent::__construct($blog);
    }
}
