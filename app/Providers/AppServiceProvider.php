<?php

namespace App\Providers;

use App\Helpers\PokeApiHelper;
use Illuminate\Support\ServiceProvider;
use Pokemon\Pokemon;

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
        $this->app->bind(PokeApiHelper::class, function($app){
            return new PokeApiHelper(getenv('POKEAPI_KEY'));
        });
    }
}
