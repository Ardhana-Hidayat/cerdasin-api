<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CheckClassSelection
{
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();

        if (!$user || is_null($user->selected_class_id)) {
            return response()->json([
                'response_code' => 403,
                'status' => 'error',
                'message' => 'Anda belum memilih kelas. Silakan pilih kelas terlebih dahulu untuk mengakses menu ini.'
            ], 403);
        }

        return $next($request);
    }
}