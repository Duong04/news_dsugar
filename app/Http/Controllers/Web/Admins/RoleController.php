<?php

namespace App\Http\Controllers\Web\Admins;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\RoleService;
use App\Services\PermissionService;
use App\Services\ActionService;
use App\Http\Requests\Web\Admins\RoleRequest;

class RoleController extends Controller
{
    protected $roleService;
    protected $permissionService;
    protected $actionService;
    public function __construct(RoleService $roleService, PermissionService $permissionService, ActionService $actionService) {
        $this->roleService = $roleService;
        $this->permissionService = $permissionService;
        $this->actionService = $actionService;
    }

    public function index() {
        $roles = $this->roleService->getAll();
        return view('admins.roles.list', ['roles' => $roles]);
    }

    public function create() {
        $permissions = $this->permissionService->getAll();
        $actions = $this->actionService->getAll();
        return view('admins.roles.create', ['permissions' => $permissions, 'actions' => $actions]);
    }

    public function store(RoleRequest $request) {
        $roleSuccess = $this->roleService->create($request);
        if ($roleSuccess) {
            toastr()->success('Tạo role thành công!');
            return redirect()->back();
        }
    }

    public function show($id) {
        
        $role = $this->roleService->findById($id);
        $permissions = $this->permissionService->getAll();
        $actions = $this->actionService->getAll();
        return view('admins.roles.update', compact('role', 'permissions', 'actions'));
    }

    public function update(RoleRequest $request, $id) {
        $roleSuccess = $this->roleService->update($request, $id);

        if ($roleSuccess) {
            toastr()->success('Cập nhật role thành công!');
            return redirect()->route('roles');
        }
    }
}
