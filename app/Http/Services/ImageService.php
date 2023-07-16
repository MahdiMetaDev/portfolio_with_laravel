<?php

namespace App\Http\Services;

class ImageService
{
    public function createImage($image, $eloquent): void
    {
        $image_url = $image->store('public/images');

        // get uploaded image details
        $uploadedImageFileName = $image->getClientOriginalName();
        $uploadedImageFileExtension = $image->getClientOriginalExtension();

        $eloquent->image()->create([
            'name' => $uploadedImageFileName,
            'url' => $image_url,
            'extension' => $uploadedImageFileExtension,
        ]);
    }

    public function updateImage($image, $eloquent): void
    {
        if ($image) {
            $image_url = $image->store('public/images');

            $uploadedImageFileName = $image->getClientOriginalName();
            $uploadedImageFileExtension = $image->getClientOriginalExtension();

            $eloquent->image()->update([
                'name' => $uploadedImageFileName,
                'url' => $image_url,
                'extension' => $uploadedImageFileExtension,
            ]);
        }
    }
}
