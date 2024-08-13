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
use App\Http\Controllers\Web\Admins\CommentController;
use App\Http\Controllers\Web\Clients\HomeController;
use App\Http\Controllers\Web\Clients\ProfileController;
use App\Http\Controllers\Web\Clients\PostController as ClientPostController;

Route::get('/', [HomeController::class, 'index'])->name('home');


Route::middleware('auth.admin')->prefix('admin')->group(function () {
    Route::get('/dashboard', function () {
        return view('admins.dashboard.dashboard');
    })->name('dashboard');

    // Danh mục
    Route::get('/danh-muc', [CategoryController::class, 'index'])->name('categories')->middleware('permission.action:Categories Management,viewany');
    Route::get('/them-danh-muc', [CategoryController::class, 'create'])->name('create.category')->middleware('permission.action:Categories Management,create');
    Route::post('/them-danh-muc', [CategoryController::class, 'store'])->name('store.category')->middleware('permission.action:Categories Management,create');
    Route::get('/sua-danh-muc/{id}', [CategoryController::class, 'show'])->name('show.category')->middleware('permission.action:Categories Management,view');
    Route::put('/sua-danh-muc/{id}', [CategoryController::class, 'edit'])->name('update.category')->middleware('permission.action:Categories Management,update');
    Route::delete('/xoa-danh-muc/{id}', [CategoryController::class, 'destroy'])->name('delete.category')->middleware('permission.action:Categories Management,delete');

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
    Route::get('/permissions', [PermissionController::class, 'index'])->name('permissions')->middleware('permission.action:Permissions Management,viewany');
    Route::get('/create-permission', [PermissionController::class, 'create'])->name('create.permission')->middleware('permission.action:Permissions Management,create');
    Route::post('/create-permissions', [PermissionController::class, 'store'])->name('store.permission')->middleware('permission.action:Permissions Management,create');
    Route::get('/update-permissions/{id}', [PermissionController::class, 'show'])->name('show.permission')->middleware('permission.action:Permissions Management,view');
    Route::put('/update-permissions/{id}', [PermissionController::class, 'update'])->name('update.permission')->middleware('permission.action:Permissions Management,update');
    Route::delete('/permissions/{id}', [PermissionController::class, 'delete'])->name('delete.permission')->middleware('permission.action:Permissions Management,delete');

    // Vai trò
    Route::get('/role', [RoleController::class, 'index'])->name('roles')->middleware('permission.action:Roles Management,viewany');
    Route::get('/create-role', [RoleController::class, 'create'])->name('create.role')->middleware('permission.action:Roles Management,create');
    Route::post('/create-role', [RoleController::class, 'store'])->name('store.role')->middleware('permission.action:Roles Management,create');
    Route::get('/update-role/{id}', [RoleController::class, 'show'])->name('show.role')->middleware('permission.action:Roles Management,view');
    Route::put('/update-role/{id}', [RoleController::class, 'update'])->name('update.role')->middleware('permission.action:Roles Management,update');

    // Action
    Route::get('/actions', [ActionController::class, 'index'])->name('actions')->middleware('permission.action:Actions Management,viewany');
    Route::get('/create-action', [ActionController::class, 'create'])->name('create.action')->middleware('permission.action:Actions Management,create');
    Route::post('/create-action', [ActionController::class, 'store'])->name('store.action')->middleware('permission.action:Actions Management,create');
    Route::get('/update-action/{id}', [ActionController::class, 'show'])->name('show.action')->middleware('permission.action:Actions Management,view');
    Route::put('/actions/{id}', [ActionController::class, 'update'])->name('update.action')->middleware('permission.action:Actions Management,update');
    Route::delete('/actions/{id}', [ActionController::class, 'delete'])->name('delete.action')->middleware('permission.action:Actions Management,delete');

    // User
    Route::get('/users', [UserController::class, 'index'])->name('users')->middleware('permission.action:Users Management,viewany');
    Route::get('/users/{id}', [UserController::class, 'show'])->name('show.user')->middleware('permission.action:Users Management,view');
    Route::get('/create-user', [UserController::class, 'create'])->name('create.user');
    Route::post('/create-user', [UserController::class, 'store'])->name('store.user');

    //grant permissions
    Route::get('/grant-role', [UserController::class, 'grantRole'])->name('grant.role');

    //Type 
    Route::get('/type-roles', [TypeController::class, 'index'])->name('types');
    Route::post('/type-roles', [TypeController::class, 'store'])->name('store.type');
    Route::put('/type-roles/{id}', [TypeController::class, 'update'])->name('update.type');
    Route::delete('/type-roles/{id}', [TypeController::class, 'delete'])->name('delete.type');

    Route::get('/binh-luan', [CommentController::class, 'index'])->name('comments');
    Route::delete('/xoa-binh-luan/{id}', [CommentController::class, 'delete'])->name('delete.comment');
});

Route::middleware('auth')->group(function() {
    Route::get('/tai-khoan', [ProfileController::class, 'account'])->name('profile');
    Route::get('/them-bai-viet', [ClientPostController::class, 'create'])->name('client.create.post');
    Route::post('/them-bai-viet', [ClientPostController::class, 'store'])->name('client.store.post');
});

Route::middleware('guest')->group(function () {
    Route::get('/dang-nhap', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/dang-nhap', [AuthController::class, 'actionLogin'])->name('action.login');
    Route::get('/dang-ky', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/dang-ky', [AuthController::class, 'actionRegister'])->name('action.register');
    Route::get('/email/verify/{token}', [AuthController::class, 'verifyEmail']);
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/upload', [PostController::class, 'upload']);
Route::post('/upload', [PostController::class, 'postUpload']);
Route::get('/check-mail', function () {
    return view('clients.auth.checkmail');
})->name('checkmail');


Route::get('/search', [HomeController::class, 'search'])->name('search');

Route::get('/bai-viet/{post}', [ClientPostController::class, 'postDetail'])->name('post.detail');
Route::get('/{category}', [ClientPostController::class, 'getPostByCategory'])->name('category');
Route::get('/{category}/{subcategory}', [ClientPostController::class, 'getPostBySubcategory'])->name('subcategory');


Route::fallback(function () {
    return view('errors.404');
});