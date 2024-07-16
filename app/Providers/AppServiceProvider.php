<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\User\UserRepositoryInterface;
use App\Repositories\Category\CategoryRepositoryInterface;
use App\Repositories\Subcategory\SubcategoryRepositoryInterface;
use App\Repositories\Post\PostRepositoryInterface;
use App\Services\AuthService;
use App\Services\CategoryService;
use App\Services\SubcategoryService;
use App\Services\PostService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(AuthService::class, function ($app) {
            return new AuthService($app->make(UserRepositoryInterface::class));
        });
        $this->app->bind(CategoryService::class, function ($app) {
            return new CategoryService($app->make(CategoryRepositoryInterface::class));
        });
        $this->app->bind(SubcategoryService::class, function ($app) {
            return new SubcategoryService($app->make(SubcategoryRepositoryInterface::class));
        });
        $this->app->bind(PostService::class, function ($app) {
            return new PostService($app->make(PostRepositoryInterface::class));
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
