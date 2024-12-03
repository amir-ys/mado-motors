<?php

namespace App\Providers;

use App\Contracts\Services\ContactUSServiceInterface;
use App\Contracts\Services\SettingServiceInterface;
use App\Services\ContactUSService;
use App\Services\SettingService;
use App\Utilities\CustomPaginator;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\RateLimiter;
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
        $this->routeHandler();
        $this->bindServices();
        $this->bindFacades();
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        RateLimiter::for('login', function (Request $request) {
            return Limit::
            perMinute(6)
                ->by($request->input('username') . $request->ip());
        });

    }

    /**
     * @return void
     */
    public function bindServices(): void
    {
        $this->app->bind(
            LengthAwarePaginator::class,
            CustomPaginator::class
        );

        $this->app->bind(
            ContactUSServiceInterface::class,
            ContactUSService::class
        );

        $this->app->bind(
            SettingServiceInterface::class,
            SettingService::class
        );
    }

    /**
     * @return void
     */
    public function routeHandler(): void
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

    private function bindFacades()
    {
        $this->app->bind(
            'setting',
            SettingServiceInterface::class
        );
    }
}
