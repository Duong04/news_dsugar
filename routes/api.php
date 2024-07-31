<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\SubcategoryController;
use App\Http\Controllers\Api\PermissionController;
use App\Http\Controllers\Api\ActionController;
use App\Http\Controllers\Api\RoleController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\TypeController;


Route::prefix('v1')->group(function () {
    Route::get('/categories/{id}/subcategories', [SubcategoryController::class, 'getByCategoryId']);

    Route::get('/permissions/{id}', [PermissionController::class, 'getById']);

    Route::get('/actions/{id}', [ActionController::class, 'getById']);

    Route::get('/roles/{id}', [RoleController::class, 'getById']);

    Route::put('/users/{id}/status', [UserController::class, 'updateStatus']);
    Route::put('/users/{id}/role', [UserController::class, 'updateRole']);

    Route::get('types/{id}', [TypeController::class, 'getById']);
});