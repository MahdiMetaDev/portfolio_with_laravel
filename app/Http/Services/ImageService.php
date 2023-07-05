<?php

namespace App\Http\Services;

class ImageService
{
    public function createImage($image, $eloquent): void
    {
        $image_url = $image->store('images');

        // get uploaded image details
        $uploadedImageFileName = $image->getClientOriginalName();
        $uploadedImageFileExtension = $image->getClientOriginalExtension();

        $eloquent->image()->create([

        ]);
    }

    public function updateImage()
    {

    }
}
