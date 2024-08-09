<?php

namespace App\Http\Controllers\Web\Admins;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\UserService;
use App\Services\RoleService;

class UserController extends Controller
{
    private $userService;
    private $roleService;
    public function __construct(UserService $userService, RoleService $roleService) {
        $this->userService = $userService;
        $this->roleService = $roleService;
    }

    public function index() {
        $users = $this->userService->getAll();
        return view('admins.users.list', ['users' => $users]);
    }

    public function grantRole() {
        $roles = $this->roleService->getAll();
        $users = $this->userService->getAll();
        return view('admins.users.grant-role', ['users' => $users, 'roles'  => $roles]);
    }
}
