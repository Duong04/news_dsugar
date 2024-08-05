<?php

namespace App\Http\Controllers\Web\Admins;

use App\Http\Controllers\Controller;
use App\Http\Resources\PermissionResource;
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
        return $roleSuccess;
        if ($roleSuccess) {
            toastr()->success('Tạo role thành công!');
            return redirect()->back();
        }
    }

    public function show($id) {
        $response = $this->roleService->findById($id);
        $permissions = $response->permissions;
        $role = [
            'id' => $response->id,
            'name' => $response->name,
            'description' => $response->description,
            'type_id' => $response->type_id,
            'permissions' => $permissions->map(function ($permission) use ($response) {
                $filteredActions = $permission->actions->filter(function ($action) use ($response, $permission) {
                    return $action->pivot->role_id == $response->id && $action->pivot->permission_id == $permission->id;
                })->values();
                return [
                    'id' => $permission->id,
                    'name' => $permission->name,
                    'description' => $permission->description,
                    'actions' => $filteredActions->map(function ($action) {
                        return [
                            'id' => $action->id,
                            'name' => $action->name,
                            'value' => $action->value, // Thêm value nếu cần thiết
                        ];
                    })
                ];
            })
        ];
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
