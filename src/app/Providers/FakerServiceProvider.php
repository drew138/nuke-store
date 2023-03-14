<?php

namespace App\Providers;

use App\Faker\BombProvider;
use Faker\{Factory, Generator};
use Illuminate\Support\ServiceProvider;


class FakerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(Generator::class, function () {
            $faker = Factory::create();
            $faker->addProvider(new BombProvider($faker));
            return $faker;
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
