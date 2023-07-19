<?php

namespace App\Repositories\Image;

use App\Interfaces\Image\ImageRepositoryInterface;
use App\Models\Image;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

class ImageRepository extends BaseRepository implements ImageRepositoryInterface
{
    public function __construct(Image $image)
    {
        parent::__construct($image);
    }

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
