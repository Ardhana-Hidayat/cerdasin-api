<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // <-- Import Auth
use Symfony\Component\HttpFoundation\Response;

class CheckRoleMiddleware
{
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        if (!Auth::check()) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        $userRole = Auth::user()->role;

        foreach ($roles as $role) {
            if ($userRole == $role) {
                return $next($request); 
            }
        }

        return response()->json(['message' => 'Forbidden: Access denied for your role.'], 403);
    }
}