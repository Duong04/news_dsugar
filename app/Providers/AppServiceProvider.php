<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\User\UserRepositoryInterface;
use App\Repositories\Category\CategoryRepositoryInterface;
use App\Repositories\Subcategory\SubcategoryRepositoryInterface;
use App\Repositories\Post\PostRepositoryInterface;
use App\Repositories\Role\RoleRepositoryInterface;
use App\Repositories\Permission\PermissionRepositoryInterface;
use App\Services\AuthService;
use App\Services\CategoryService;
use App\Services\SubcategoryService;
use App\Services\PostService;
use App\Services\RoleService;
use App\Services\PermissionService;

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
        $this->app->bind(RoleService::class, function ($app) {
            return new RoleService($app->make(RoleRepositoryInterface::class));
        });
        $this->app->bind(PermissionService::class, function ($app) {
            return new PermissionService($app->make(PermissionRepositoryInterface::class));
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
