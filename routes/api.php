<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\SubcategoryController;


Route::prefix('v1')->group(function () {
    Route::get('/categories/{id}/subcategories', [SubcategoryController::class, 'getByCategoryId']);
});