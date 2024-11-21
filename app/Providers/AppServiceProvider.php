<?php

namespace App\Providers;

use App\Contracts\BlogCategoryRepositoryInterface;
use App\Contracts\BlogRepositoryInterface;
use App\Contracts\CityRepositoryInterface;
use App\Contracts\ErrorBrandRepositoryInterface;
use App\Contracts\ErrorCategoryRepositoryInterface;
use App\Contracts\ErrorItemsRepositoryInterface;
use App\Contracts\ErrorRepositoryInterface;
use App\Contracts\ProductCategoryRepositoryInterface;
use App\Contracts\ProductRepositoryInterface;
use App\Contracts\RequestRepositoryInterface;
use App\Contracts\UserRepositoryInterface;
use App\Http\Commands\TruncateFourTablesCommand;
use App\Models\Error;
use App\Models\ErrorCategory;
use App\Observers\ErrorCategoryObserver;
use App\Observers\ErrorObserver;
use App\Repositories\BlogCategoryRepository;
use App\Repositories\BlogRepository;
use App\Repositories\CityRepository;
use App\Repositories\ErrorBrandRepository;
use App\Repositories\ErrorCategoryRepository;
use App\Repositories\ErrorItemsRepository;
use App\Repositories\ErrorRepository;
use App\Repositories\ProductCategoryRepository;
use App\Repositories\ProductRepository;
use App\Repositories\RequestRepository;
use App\Repositories\UserRepository;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
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
        $this->app->bind(
            UserRepositoryInterface::class,
            UserRepository::class
        );
        $this->app->bind(
            RequestRepositoryInterface::class,
            RequestRepository::class
        );
        $this->app->bind(
            CityRepositoryInterface::class,
            CityRepository::class
        );
        $this->app->bind(
            BlogRepositoryInterface::class,
            BlogRepository::class
        );
        $this->app->bind(
            BlogCategoryRepositoryInterface::class,
            BlogCategoryRepository::class
        );
        $this->app->bind(
            ProductRepositoryInterface::class,
            ProductRepository::class
        );
        $this->app->bind(
            ProductCategoryRepositoryInterface::class,
            ProductCategoryRepository::class
        );
        $this->app->bind(
            ErrorRepositoryInterface::class,
            ErrorRepository::class
        );
        $this->app->bind(
            ErrorItemsRepositoryInterface::class,
            ErrorItemsRepository::class
        );
        $this->app->bind(
            ErrorCategoryRepositoryInterface::class,
            ErrorCategoryRepository::class
        );

        $this->app->bind(
            ErrorBrandRepositoryInterface::class,
            ErrorBrandRepository::class
        );

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
        RateLimiter::for('send-code', function (Request $request) {
            return Limit::perMinute(2)->by( $request->input('cell_number') . $request->ip());
        });

        RateLimiter::for('login', function (Request $request) {
            return Limit::perMinute(6)->by($request->input('username') . $request->ip());
        });

        RateLimiter::for('verify-code', function (Request $request) {
            return Limit::perMinute(6)->by($request->ip());
        });
        ErrorCategory::observe(ErrorCategoryObserver::class);
        Error::observe(ErrorObserver::class);
    }
}
