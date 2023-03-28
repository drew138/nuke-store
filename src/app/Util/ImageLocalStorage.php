<?php

namespace App\Util;

use App\Interfaces\ImageStorage;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class ImageLocalStorage implements ImageStorage
{
    public function store(UploadedFile $image): string
    {
        // Creating an uniq path for the image
        $imageUrl = uniqid() . $image->getClientOriginalName();

        Storage::disk('public')->put(
            $imageUrl,
            file_get_contents($image->getRealPath())
        );

        // Returning the image's path
        return 'storage/' . $imageUrl;
    }
}
