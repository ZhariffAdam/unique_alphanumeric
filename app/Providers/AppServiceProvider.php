<?php

namespace App\Providers;

use App\Faker\ReferenceNumber;
use Faker\Generator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $faker = $this->app->make(Generator::class);
        $faker->addProvider(new ReferenceNumber($faker));
    }
}
