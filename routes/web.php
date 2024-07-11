<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\Clients\AuthController;
use App\Http\Controllers\Web\Admins\CategoryController;;

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
    Route::get('/danh-muc', [CategoryController::class, 'index'])->name('categories');
    Route::get('/them-danh-muc', [CategoryController::class, 'create'])->name('create.category');
    Route::post('/them-danh-muc', [CategoryController::class, 'store'])->name('store.category');
});