<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 
use Symfony\Component\HttpFoundation\Response;

class CheckRoleMiddleware
{
    public function handle(Request $request, Closure $next, string $role): Response
    {
        if (!Auth::check()) {
            return response()->json([
                'response_code' => 401,
                'status' => 'error',
                'message' => 'Token tidak valid atau belum login.'
            ], 401);
        }

        $user = Auth::user();

        if ($user->role !== $role) {
            return response()->json([
                'response_code' => 403,
                'status' => 'error',
                'message' => 'Akses ditolak! Anda login sebagai ' . ucfirst($user->role) . ', tetapi endpoint ini khusus untuk ' . ucfirst($role) . '.'
            ], 403);
        }

        return $next($request);
    }
}