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
});

Route::get('/dang-ky', function () {
    return view('clients.auth.register');
});
