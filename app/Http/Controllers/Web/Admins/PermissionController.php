<?php

namespace App\Http\Controllers\Web\Admins;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\PermissionService;
use App\Services\ActionService;
use App\Http\Requests\Web\Admins\PermissionRequest;

class PermissionController extends Controller
{
    protected $permissionService;
    protected $actionService;
    public function __construct(PermissionService $permissionService, ActionService $actionService) {
        $this->permissionService = $permissionService;
        $this->actionService = $actionService;
    }

    public function index() {
        $permissons = $this->permissionService->getAll();
        return view('admins.permissions.list', ['permissions' => $permissons]);
    }

    public function create() {
        $actions = $this->actionService->getAll();
        return view('admins.permissions.create', ['actions' => $actions]);
    }

    public function store(PermissionRequest $request) {
        $permissonSuccess = $this->permissionService->create($request);
        if ($permissonSuccess) {
            toastr()->success('Thêm quyền thành công!');
            return redirect()->back();
        }
    }

    public function show($id) {
        $actions = $this->actionService->getAll();
        $permission = $this->permissionService->findById($id);
        return view('admins.permissions.update', ['permission' => $permission, 'actions' => $actions]);
    }

    public function update(PermissionRequest $request, $id) {
        $permissonSuccess = $this->permissionService->update($request, $id);
        if ($permissonSuccess) {
            toastr()->success('Cập nhật thành công!');
            return redirect()->route('permissions');
        }
    }

    public function delete($id) {
        $permissonSuccess = $this->permissionService->delete($id);
        if ($permissonSuccess) {
            toastr()->success('Xóa quyền thành công!');
            return redirect()->back();
        }
    }
}
