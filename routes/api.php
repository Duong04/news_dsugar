<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\SubcategoryController;
use App\Http\Controllers\Api\PermissionController;
use App\Http\Controllers\Api\ActionController;
use App\Http\Controllers\Api\RoleController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\TypeController;
use App\Http\Controllers\Api\CommentController;
use App\Http\Controllers\Api\CommentReplyController;
use App\Http\Controllers\Api\PostController;


Route::prefix('v1')->group(function () {
    Route::prefix('comments')->group(function () {
        Route::get('/', [CommentController::class, 'index']);
        Route::get('/posts/{id}', [CommentController::class, 'commentByPostId']);
        Route::post('/', [CommentController::class, 'create']);
        Route::delete('/{id}', [CommentController::class, 'delete']);
    });
    Route::prefix('comment-replys')->group(function () {
        Route::post('/', [CommentReplyController::class, 'create']);
        Route::delete('/{id}', [CommentReplyController::class, 'delete']);
    });
    Route::prefix('posts')->group(function () {
        Route::get('/', [PostController::class, 'index']);
    });
    Route::get('/categories/{id}/subcategories', [SubcategoryController::class, 'getByCategoryId']);

    Route::get('/permissions/{id}', [PermissionController::class, 'getById']);

    Route::get('/actions/{id}', [ActionController::class, 'getById']);

    Route::get('/roles/{id}', [RoleController::class, 'getById']);

    Route::put('/users/{id}/status', [UserController::class, 'updateStatus']);
    Route::put('/users/{id}/role', [UserController::class, 'updateRole']);

    Route::get('types/{id}', [TypeController::class, 'getById']);
});