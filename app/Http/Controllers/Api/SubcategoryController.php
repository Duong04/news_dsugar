<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\SubcategoryService;

class SubcategoryController extends Controller
{
    protected $subcategoryService;
    public function __construct(SubcategoryService $subcategoryService) {
        $this->subcategoryService = $subcategoryService;
    }

    public function getByCategoryId($categoryId) {
        $subcategories = $this->subcategoryService->findCategoryId($categoryId);
        return response()->json($subcategories, 200);
    }
}
