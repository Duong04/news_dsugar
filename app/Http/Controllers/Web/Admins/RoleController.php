<?php

namespace App\Http\Controllers\Web\Admins;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\RoleService;

class RoleController extends Controller
{
    protected $roleService;
    public function __construct(RoleService $roleService) {
        $this->roleService = $roleService;
    }

    public function index() {
        $roles = $this->roleService->getAll();
        return view('admins.roles.list', ['roles' => $roles]);
    }
}
