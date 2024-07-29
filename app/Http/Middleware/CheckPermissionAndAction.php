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
        $user = Auth::user()->load([
            'role.permissions.actions' => function ($query) {
                $query->distinct();
            }
        ]);

        $user = new UserResource($user);

        if (!$user->hasPermission($permission) || !$user->hasAction($action)) {
            abort(403);
        }

        return $next($request);
    }
}
