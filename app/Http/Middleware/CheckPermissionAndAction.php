<?php

namespace App\Http\Middleware;

use App\Http\Resources\UserResource;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Auth;

class CheckPermissionAndAction
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $permission, $action): Response
    {
        $user = Auth::user();
        $role_id = $user->role->id;

        if (!$user->hasPermission($permission) || !$user->hasAction($permission, $action, $role_id)) {
            abort(403);
        }

        return $next($request);
    }
}
