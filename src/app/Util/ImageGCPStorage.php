<?php

namespace App\Util;

use App\Interfaces\ImageStorage;
use Google\Cloud\Storage\StorageClient;
use Illuminate\Http\UploadedFile;

class ImageGCPStorage implements ImageStorage
{
    public function store(UploadedFile $image): string
    {
        $serviceAccountPath = env('SERVICE_ACCOUNT_PATH');
        $gcpKeyFile = file_get_contents($serviceAccountPath);
        $storage = new StorageClient(['keyFile' => json_decode($gcpKeyFile, true)]);
        $bucket = $storage->bucket(env('GOOGLE_CLOUD_STORAGE_BUCKET'));
        $timestamp = time(); // get current timestamp
        $extension = $image->getClientOriginalExtension();
        $imageName = $timestamp . '_' . uniqid() . '.' . $extension;

        $storedImage = $bucket->upload(
            file_get_contents($image),
            [
                'name' => $imageName,
            ]
        );

        $objectName = $storedImage->name();
        $objectPublicUrl = "https://storage.googleapis.com/" . env('GOOGLE_CLOUD_STORAGE_BUCKET') . "/" . $objectName;
        return $objectPublicUrl;
    }
}
