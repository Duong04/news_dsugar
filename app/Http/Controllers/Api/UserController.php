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

    public function countUserByMonths(Request $request) {
        try {
            $users = $this->userService->countUsersInLast12Months($request);
            return response()->json(['data' => $users], 200);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 500);
        }
    }
}
