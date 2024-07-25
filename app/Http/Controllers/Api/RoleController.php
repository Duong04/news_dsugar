<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\RoleService;

class RoleController extends Controller
{
    protected $roleService;

    public function __construct(RoleService $roleService) {
        $this->roleService = $roleService;
    }

    public function getById($id) {
        $role = $this->roleService->findById($id);
        return response()->json($role, 200);
    }
}
