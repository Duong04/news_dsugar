<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Auth;

class AuthAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            $type = Auth::user()->role->typeRole->name;
            if ($type == 'System' || $type == 'Administration') {
                return $next($request);
            }
            abort(403);
        }

        return redirect()->route('login');
    }
}
