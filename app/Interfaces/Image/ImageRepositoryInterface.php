<?php

namespace App\Interfaces\Image;

use App\Interfaces\BaseRepositoryInterface;

interface ImageRepositoryInterface extends BaseRepositoryInterface
{
    public function createImage($image, $eloquent): void;

    public function updateImage($image, $eloquent): void;
}
