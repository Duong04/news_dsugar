<?php

namespace App\Http\Controllers\Web\Admins;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\SubcategoryService;

class SubcategoryController extends Controller
{
    protected $subcategoryService;

    public function __construct(SubcategoryService $subcategoryService) {
        $this->subcategoryService = $subcategoryService;
    }

    public function index() {
        $subacategories = $this->subcategoryService->getAll();
        return view('admins.subcategories.list', ['subcategories' => $subacategories]);
    }

    public function create() {
        return view('admins.subcategories.create');
    }
}
