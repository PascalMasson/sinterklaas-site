<?php

namespace App\Providers;

use App\Models\User;
use Config;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;
use Laravel\Sanctum\Sanctum;
use URL;
use View;

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
        Sanctum::ignoreMigrations();

        if (class_exists(\Barryvdh\Debugbar\ServiceProvider::class)) {
            $this->app->register(\Barryvdh\Debugbar\ServiceProvider::class);
        }


        if (Config::get('app.env') === 'production') {
//            URL::forceRootUrl(Config::get('app.url'));
            URL::forceScheme('https');
        }

        Validator::extend('float', function ($attribute, $value, $parameters, $validator) {
            $thousandsSeparator = '\\.';
            $commaSeparator = ',';
            $regex = '/^\d+(?:[.,]\d{1,2})?$/';
            $validate = preg_match($regex, $value);

            if ($validate === 1) {
                return true;
            }

            return false;
        });
    }
}
