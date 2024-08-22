<?php

namespace App\Policies;

use App\Models\User;

class GeneralPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function check(User $user, $permission, $action, $role_id = null)
    {
        if ($user->role->name == 'Super Admin') {
            return true;
        }

        $role_id = $role_id ?: $user->role->id;

        return $user->hasPermission($permission) && $user->hasAction($permission, $action, $role_id);
    }
}
