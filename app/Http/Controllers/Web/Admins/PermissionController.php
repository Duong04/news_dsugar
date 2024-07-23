<?php

namespace App\Http\Controllers\Web\Admins;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\PermissionService;
use App\Http\Requests\Web\Admins\PermissionRequest;

class PermissionController extends Controller
{
    protected $permissionService;
    public function __construct(PermissionService $permissionService) {
        $this->permissionService = $permissionService;
    }

    public function index() {
        $permissons = $this->permissionService->getAll();
        return view('admins.permissions.list', ['permissions' => $permissons]);
    }

    public function store(PermissionRequest $request) {
        $permissonSuccess = $this->permissionService->create($request);
        if ($permissonSuccess) {
            toastr()->success('Thêm quyền thành công!');
            return redirect()->back();
        }
    }
}
