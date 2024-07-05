<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('clients.home.home');
});

Route::get('/tin-tuc', function () {
    return view('clients.news.news');
});

Route::get('/dang-nhap', function () {
    return view('clients.auth.login');
})->name('login');

Route::get('/dang-ky', function () {
    return view('clients.auth.register');
})->name('register');

Route::get('/chi-tiet', function () {
    return view('clients.news.new-detail');
});

Route::prefix('admin')->group(function () {
    Route::get('/dashboard', function () {
        
        return view('admins.dashboard.dashboard');
    });
});