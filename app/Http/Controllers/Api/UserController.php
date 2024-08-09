<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\UserService;

class UserController extends Controller
{
    protected $userService;
    public function __construct(UserService $userService) {
        $this->userService = $userService;
    }

    public function updateStatus(Request $request, $id) {
        $user = $this->userService->updateStatus($request, $id);
        if ($user !== true) {
            return response()->json(['error' => $user], 422);
        }
        return response()->json(['message' => 'Update Status Successfully'], 203);
    }

    public function updateRole(Request $request, $id) {
        $user = $this->userService->updateRole($request, $id);
        if ($user !== true) {
            return response()->json(['error' => $user], 422);
        }
        return response()->json(['message' => 'Update Role Successfully'], 203);
    }
}
