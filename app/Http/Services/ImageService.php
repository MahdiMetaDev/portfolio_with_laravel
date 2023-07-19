<?php

namespace App\Http\Services;

use App\Interfaces\Image\ImageRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class ImageService
{
    public function __construct(private readonly ImageRepositoryInterface $repository)
    {
    }

    public function store($image, $eloquent)
    {
        $this->repository->createImage($image, $eloquent);
    }

    public function update($image, $eloquent)
    {
        $this->repository->updateImage($image, $eloquent);
    }
}
