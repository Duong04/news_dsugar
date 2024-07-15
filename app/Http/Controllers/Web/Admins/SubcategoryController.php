<?php

namespace App\Http\Controllers\Web\Admins;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\SubcategoryService;
use App\Http\Requests\Web\Admins\SubcategoryRequest;

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

    public function store(SubcategoryRequest $request) {
        $subcategorySuccess = $this->subcategoryService->create($request);
        if ($subcategorySuccess) {
            toastr()->success('Đã thêm danh mục con thành công!');
            return redirect()->back();
        }
    }

    public function show($id) {
        $subcategory = $this->subcategoryService->findId($id);
        return view('admins.subcategories.update', ['subcategory' => $subcategory]);
    }

    public function update(SubcategoryRequest $request, $id) {
        $subcategorySuccess = $this->subcategoryService->update($request, $id);
        if ($subcategorySuccess) {
            toastr()->success('Cập nhật danh mục con thành công!');
            return redirect()->route('subcategories');
        }
    }

    public function destroy($id) {
        $subcategorySuccess = $this->subcategoryService->delete($id);
        if ($subcategorySuccess) {
            toastr()->success('Xóa danh mục con thành công!');
            return redirect()->back();
        }
    }
}
