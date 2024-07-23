<?php

namespace App\Http\Controllers\Web\Admins;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\RoleService;
use App\Services\PermissionService;

class RoleController extends Controller
{
    protected $roleService;
    protected $permissionService;
    public function __construct(RoleService $roleService, PermissionService $permissionService) {
        $this->roleService = $roleService;
        $this->permissionService = $permissionService;
    }

    public function index() {
        $roles = $this->roleService->getAll();
        return view('admins.roles.list', ['roles' => $roles]);
    }

    public function create() {
        $permissions = $this->permissionService->getAll();
        return view('admins.roles.create', ['permissions' => $permissions]);
    }
}
