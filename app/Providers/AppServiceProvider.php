<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\User\UserRepositoryInterface;
use App\Repositories\Category\CategoryRepositoryInterface;
use App\Repositories\Subcategory\SubcategoryRepositoryInterface;
use App\Repositories\Post\PostRepositoryInterface;
use App\Repositories\Role\RoleRepositoryInterface;
use App\Repositories\Permission\PermissionRepositoryInterface;
use App\Repositories\RolePermission\RolePermissionRepositoryInterface;
use App\Repositories\Action\ActionRepositoryInterface;
use App\Repositories\PermissionAction\PermissionActionRepositoryInterface;
use App\Repositories\TypeRole\TypeRoleRepositoryInterface;
use App\Services\AuthService;
use App\Services\CategoryService;
use App\Services\SubcategoryService;
use App\Services\PostService;
use App\Services\RoleService;
use App\Services\PermissionService;
use App\Services\RolePermissionService;
use App\Services\ActionService;
use App\Services\CloundinaryService;
use App\Services\TypeRoleService;

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
            return new PostService($app->make(PostRepositoryInterface::class), $app->make(CloundinaryService::class));
        });
        $this->app->bind(RoleService::class, function ($app) {
            return new RoleService($app->make(RoleRepositoryInterface::class), $app->make(RolePermissionRepositoryInterface::class));
        });
        $this->app->bind(PermissionService::class, function ($app) {
            return new PermissionService($app->make(PermissionRepositoryInterface::class), $app->make(PermissionActionRepositoryInterface::class));
        });
        $this->app->bind(RolePermissionService::class, function ($app) {
            return new RolePermissionService($app->make(RolePermissionRepositoryInterface::class));
        });
        $this->app->bind(ActionService::class, function ($app) {
            return new ActionService($app->make(ActionRepositoryInterface::class));
        });
        $this->app->bind(TypeRoleService::class, function ($app) {
            return new TypeRoleService($app->make(TypeRoleRepositoryInterface::class));
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
