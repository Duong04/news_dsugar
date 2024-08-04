<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\Clients\AuthController;
use App\Http\Controllers\Web\Admins\CategoryController;
use App\Http\Controllers\Web\Admins\SubcategoryController;
use App\Http\Controllers\Web\Admins\PostController;
use App\Http\Controllers\Web\Admins\PermissionController;
use App\Http\Controllers\Web\Admins\RoleController;
use App\Http\Controllers\Web\Admins\ActionController;
use App\Http\Controllers\Web\Admins\UserController;
use App\Http\Controllers\Web\Admins\TypeController;
use App\Http\Controllers\Web\Clients\HomeController;
use App\Http\Controllers\Web\Clients\PostController as ClientPostController;

Route::get('/', [HomeController::class, 'index'])->name('home');


Route::middleware('auth.admin')->prefix('admin')->group(function () {
    Route::get('/dashboard', function () {
        return view('admins.dashboard.dashboard');
    })->name('dashboard');

    // Danh mục
    Route::get('/danh-muc', [CategoryController::class, 'index'])->name('categories');
    Route::get('/them-danh-muc', [CategoryController::class, 'create'])->name('create.category');
    Route::post('/them-danh-muc', [CategoryController::class, 'store'])->name('store.category');
    Route::get('/sua-danh-muc/{id}', [CategoryController::class, 'show'])->name('show.category');
    Route::put('/sua-danh-muc/{id}', [CategoryController::class, 'edit'])->name('update.category');
    Route::delete('/xoa-danh-muc/{id}', [CategoryController::class, 'destroy'])->name('delete.category');

    // Danh mục con
    Route::get('/danh-muc-con', [SubcategoryController::class, 'index'])->name('subcategories')->middleware('permission.action:Subcategies Management,viewany');
    Route::get('/them-danh-muc-con', [SubcategoryController::class, 'create'])->name('create.subcategory')->middleware('permission.action:Subcategies Management,create');
    Route::post('/them-danh-muc-con', [SubcategoryController::class, 'store'])->name('store.subcategory')->middleware('permission.action:Subcategies Management,create');
    Route::get('/sua-danh-muc-con/{id}', [SubcategoryController::class, 'show'])->name('show.subcategory')->middleware('permission.action:Subcategies Management,view');
    Route::put('/sua-danh-muc-con/{id}', [SubcategoryController::class, 'update'])->name('update.subcategory')->middleware('permission.action:Subcategies Management,update');
    Route::delete('/xoa-danh-muc-con/{id}', [SubcategoryController::class, 'destroy'])->name('delete.subcategory')->middleware('permission.action:Subcategies Management,update');
    
    // Bài viết
    Route::get('/bai-viet', [PostController::class, 'index'])->name('posts')->middleware('permission.action:Posts Management,viewany');
    Route::get('/them-bai-viet', [PostController::class, 'create'])->name('create.post')->middleware('permission.action:Posts Management,create');
    Route::post('/them-bai-viet', [PostController::class, 'store'])->name('store.post')->middleware('permission.action:Posts Management,create');
    Route::get('/sua-bai-viet/{id}', [PostController::class, 'show'])->name('show.post')->middleware('permission.action:Posts Management,view');
    Route::put('/sua-bai-viet/{id}', [PostController::class, 'update'])->name('update.post')->middleware('permission.action:Posts Management,update');
    Route::delete('/xoa-bai-viet/{id}', [PostController::class, 'delete'])->name('delete.post')->middleware('permission.action:Posts Management,delete');

    // Phân quyền
    Route::get('/permissions', [PermissionController::class, 'index'])->name('permissions');
    Route::get('/create-permission', [PermissionController::class, 'create'])->name('create.permission');
    Route::post('/create-permissions', [PermissionController::class, 'store'])->name('store.permission');
    Route::get('/update-permissions/{id}', [PermissionController::class, 'show'])->name('show.permission');
    Route::put('/update-permissions/{id}', [PermissionController::class, 'update'])->name('update.permission');
    Route::delete('/permissions/{id}', [PermissionController::class, 'delete'])->name('delete.permission');

    // Vai trò
    Route::get('/role', [RoleController::class, 'index'])->name('roles');
    Route::get('/create-role', [RoleController::class, 'create'])->name('create.role');
    Route::post('/create-role', [RoleController::class, 'store'])->name('store.role');
    Route::get('/update-role/{id}', [RoleController::class, 'show'])->name('show.role');
    Route::put('/update-role/{id}', [RoleController::class, 'update'])->name('update.role');

    // Action
    Route::get('/actions', [ActionController::class, 'index'])->name('actions');
    Route::get('/create-action', [ActionController::class, 'create'])->name('create.action');
    Route::post('/create-action', [ActionController::class, 'store'])->name('store.action');
    Route::get('/update-action/{id}', [ActionController::class, 'show'])->name('show.action');
    Route::put('/actions/{id}', [ActionController::class, 'update'])->name('update.action');
    Route::delete('/actions/{id}', [ActionController::class, 'delete'])->name('delete.action');

    // User
    Route::get('/users', [UserController::class, 'index'])->name('users');

    //grant permissions
    Route::get('/grant-role', [UserController::class, 'grantRole'])->name('grant.role');

    //Type 
    Route::get('type-roles', [TypeController::class, 'index'])->name('types');
    Route::post('type-roles', [TypeController::class, 'store'])->name('store.type');
    Route::put('type-roles/{id}', [TypeController::class, 'update'])->name('update.type');
    Route::delete('type-roles/{id}', [TypeController::class, 'delete'])->name('delete.type');
});

Route::get('/dang-nhap', [AuthController::class, 'showLogin'])->name('login');
Route::post('/dang-nhap', [AuthController::class, 'actionLogin'])->name('action.login');
Route::get('/dang-ky', [AuthController::class, 'showRegister'])->name('register');
Route::post('/dang-ky', [AuthController::class, 'actionRegister'])->name('action.register');
Route::get('/email/verify/{token}', [AuthController::class, 'verifyEmail']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/upload', [PostController::class, 'upload']);
Route::post('/upload', [PostController::class, 'postUpload']);
Route::get('/check-mail', function () {
    return view('clients.auth.checkmail');
})->name('checkmail');

Route::get('/chi-tiet', function () {
    return view('clients.news.new-detail');
});

Route::get('/bai-viet/{post}', [ClientPostController::class, 'postDetail'])->name('post.detail');
Route::get('/{category}', [ClientPostController::class, 'getPostByCategory'])->name('category');
Route::get('/{category}/{subcategory}', [ClientPostController::class, 'getPostBySubcategory'])->name('subcategory');


Route::fallback(function () {
    return view('errors.404');
});