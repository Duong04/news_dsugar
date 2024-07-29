<?php
namespace App\Services;

use App\Http\Resources\UserResource;
use Auth;
class UserService {
    public function getUser() {
        $user = Auth::user()->load([
            'role.permissions.actions' => function ($query) {
                $query->distinct();
            }
        ]);
        return new UserResource($user);
    }
}