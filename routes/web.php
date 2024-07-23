<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\Clients\AuthController;
use App\Http\Controllers\Web\Admins\CategoryController;
use App\Http\Controllers\Web\Admins\SubcategoryController;
use App\Http\Controllers\Web\Admins\PostController;
use App\Http\Controllers\Web\Admins\PermissionController;
use App\Http\Controllers\Web\Admins\RoleController;

Route::get('/', function () {
    return view('clients.home.home');
});

Route::get('/tin-tuc', function () {
    return view('clients.news.news');
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

Route::prefix('admin')->group(function () {
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
    Route::get('/danh-muc-con', [SubcategoryController::class, 'index'])->name('subcategories');
    Route::get('/them-danh-muc-con', [SubcategoryController::class, 'create'])->name('create.subcategory');
    Route::post('/them-danh-muc-con', [SubcategoryController::class, 'store'])->name('store.subcategory');
    Route::get('/sua-danh-muc-con/{id}', [SubcategoryController::class, 'show'])->name('show.subcategory');
    Route::put('/sua-danh-muc-con/{id}', [SubcategoryController::class, 'update'])->name('update.subcategory');
    Route::delete('/xoa-danh-muc-con/{id}', [SubcategoryController::class, 'destroy'])->name('delete.subcategory');
    
    // Bài viết
    Route::get('/bai-viet', [PostController::class, 'index'])->name('posts');
    Route::get('/them-bai-viet', [PostController::class, 'create'])->name('create.post');
    Route::post('/them-bai-viet', [PostController::class, 'store'])->name('store.post');
    Route::get('/sua-bai-viet/{id}', [PostController::class, 'show'])->name('show.post');

    // Phân quyền
    Route::get('/permissions', [PermissionController::class, 'index'])->name('permissions');
    Route::post('/permissions', [PermissionController::class, 'store'])->name('store.permission');

    // Vai trò
    Route::get('/role', [RoleController::class, 'index'])->name('roles');
});