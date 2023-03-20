<?php

namespace App\Util;

use App\Interfaces\ImageStorage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageLocalStorage implements ImageStorage
{
    public function store(Request $request): string
    {
        if ($request->hasFile('image')) {
            // Creating an uniq path for the image
            $imageUrl = uniqid().$request->file('image')->getClientOriginalName();

            Storage::disk('public')->put(
                $imageUrl,
                file_get_contents($request->file('image')->getRealPath())
            );

            // Returning the image's path
            return 'storage/'.$imageUrl;
        }

        return '';
    }
}
