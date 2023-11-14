<?php

namespace App\Providers;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Validator::extend('date_greater_than', function($attribute, $value, $parameters, $validator) {
            $inserted = Carbon::parse($value)->year;
            $since = $parameters[0];
            return $inserted >= $since && $inserted<= Carbon::now()->year;
        });
    }
}
