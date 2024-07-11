<?php

namespace App\Http\Controllers\Web\Admins;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\CategoryService;
use App\Http\Requests\Web\Admins\CategoryRequest;

class CategoryController extends Controller
{
    protected $categoryService;
    public function __construct(CategoryService $categoryService) {
        $this->categoryService = $categoryService;
    }
    public function index() {
        $categories = $this->categoryService->getAll();
        return view('admins.categories.list', ['categories' => $categories]);
    }

    public function create() {
        return view('admins.categories.create');
    }

    public function store(CategoryRequest $request) {
        $categorySuccess = $this->categoryService->create($request);

        toastr()->success('Đã thêm danh mục thành công!');
        return redirect()->back();
    }
}
