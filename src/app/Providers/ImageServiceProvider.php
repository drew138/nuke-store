<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\ImageStorage;
use App\Util\ImageLocalStorage;
use App\Util\ImageGCPStorage;

class ImageServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(ImageStorage::class, function ($app, $params) {
            // dd($params);
            // $storage = $params['storage'];
            // if ($storage == "local") {
            //     return new ImageLocalStorage();
            // } else if ($storage == "gcp") {
            return new ImageGCPStorage();
            // }
        });
    }
}
