<?php

namespace App\Http\Controllers\Web\Admins;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\TypeRoleService;
use App\Http\Requests\Web\Admins\TypeRequest;

class TypeController extends Controller
{
    private $typeRoleService;
    public function __construct(TypeRoleService $typeRoleService) {
        $this->typeRoleService = $typeRoleService;
    }
    public function index() {
        $types = $this->typeRoleService->getAll();
        return view('admins.types.list', ['types' => $types]);
    }

    public function store(TypeRequest $request) {
        $typeSuccess = $this->typeRoleService->create($request);
        if ($typeSuccess) {
            toastr()->success('Thêm type thành công!');
            return redirect()->back();
        }
    }

    public function delete($id) {
        $typeSuccess = $this->typeRoleService->delete($id);
        if ($typeSuccess) {
            toastr()->success('Xóa type thành công!');
            return redirect()->back();
        }
    }
}
