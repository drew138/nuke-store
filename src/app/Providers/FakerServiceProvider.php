<?php

namespace App\Providers;

use App\Faker\BombProvider;
use App\Faker\ReviewProvider;
use App\Faker\UserProvider;
use Faker\Factory;
use Faker\Generator;
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
            $faker->addProvider(new UserProvider($faker));
            $faker->addProvider(new ReviewProvider($faker));

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
