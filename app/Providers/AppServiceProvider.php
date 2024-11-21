<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        Route::macro('handler', function ($prefix) {
            $singular = Str::singular($prefix);
            $parameterName = Str::camel($singular);
            $name = Str::studly($singular);

            Route::get($prefix, 'Index' . $name);
            Route::post($prefix, 'Store' . $name);
            Route::put($prefix . '/{' . $parameterName . '}', 'Update' . $name);
            Route::delete($prefix . '/{' . $parameterName . '}', 'Destroy' . $name);
            Route::get($prefix . '/{' . $parameterName . '}', 'Show' . $name);
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
//        RateLimiter::for('send-code', function (Request $request) {
//            return Limit::perMinute(2)->by($request->input('cell_number') . $request->ip());
//        });
//
//        RateLimiter::for('login', function (Request $request) {
//            return Limit::perMinute(6)->by($request->input('username') . $request->ip());
//        });
//
//        RateLimiter::for('verify-code', function (Request $request) {
//            return Limit::perMinute(6)->by($request->ip());
//        });
    }
}
