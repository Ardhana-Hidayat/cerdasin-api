<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class AuthenticationController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'role' => 'required|in:teacher,student',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'response_code' => 400,
                'status' => 'error',
                'message' => 'Validasi gagal',
                'errors' => $validator->errors()
            ], 400);
        }

        try {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'role' => $request->role,
            ]);

            $token = $user->createToken('authToken')->plainTextToken;

            return response()->json([
                'response_code' => 200,
                'status' => 'success',
                'message' => 'Registrasi berhasil',
                'user' => [
                    'id' => $user->id,
                    'name' => $user->name,
                    'email' => $user->email,
                    'role' => $user->role,
                ],
                'token' => $token
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'response_code' => 500,
                'status' => 'error',
                'message' => 'Terjadi kesalahan saat registrasi: ' . $e->getMessage()
            ], 500);
        }
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'response_code' => 400,
                'status' => 'error',
                'message' => 'Validasi gagal',
                'errors' => $validator->errors()
            ], 400);
        }

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
                'response_code' => 401,
                'status' => 'error',
                'message' => 'Email atau password salah'
            ], 401);
        }

        $user->tokens()->delete();
        $token = $user->createToken('authToken')->plainTextToken;

        return response()->json([
            'response_code' => 200,
            'status' => 'success',
            'message' => 'Login berhasil',
            'user' => [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'role' => $user->role,
            ],
            'token' => $token
        ]);
    }

    public function userInfo()
    {
        try {
            $user = Auth::user();

            if (!$user) {
                return response()->json([
                    'response_code' => 404,
                    'status' => 'error',
                    'message' => 'Pengguna tidak ditemukan',
                ], 404);
            }

            return response()->json([
                'response_code' => 200,
                'status' => 'success',
                'message' => 'Data pengguna berhasil diambil',
                'user_info' => [
                    'id' => $user->id,
                    'name' => $user->name,
                    'email' => $user->email,
                    'role' => $user->role,
                ],
            ]);
        } catch (\Exception $e) {
            Log::error('User Info Error: ' . $e->getMessage());

            return response()->json([
                'response_code' => 500,
                'status' => 'error',
                'message' => 'Gagal mengambil data pengguna',
            ], 500);
        }
    }

    public function logOut(Request $request)
    {
        try {
            if (Auth::check()) {
                Auth::user()->tokens()->delete();

                return response()->json([
                    'response_code' => 200,
                    'status' => 'success',
                    'message' => 'Berhasil logout',
                ]);
            }

            return response()->json([
                'response_code' => 401,
                'status' => 'error',
                'message' => 'Pengguna belum login atau sesi tidak valid',
            ], 401);
        } catch (\Exception $e) {
            Log::error('Logout Error: ' . $e->getMessage());

            return response()->json([
                'response_code' => 500,
                'status' => 'error',
                'message' => 'Terjadi kesalahan saat logout',
            ], 500);
        }
    }

    public function changePassword(Request $request)
    {
        try {
            $user = Auth::user();

            $validator = Validator::make($request->all(), [
                'current_password' => 'required|string',
                'new_password' => 'required|string|min:6|confirmed',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'response_code' => 400,
                    'status' => 'error',
                    'message' => 'Validasi gagal',
                    'errors' => $validator->errors()
                ], 400);
            }

            if (!Hash::check($request->current_password, $user->password)) {
                return response()->json([
                    'response_code' => 400,
                    'status' => 'error',
                    'message' => 'Password lama yang Anda masukkan salah'
                ], 400);
            }

            $user->password = Hash::make($request->new_password);
            $user->save();

            return response()->json([
                'response_code' => 200,
                'status' => 'success',
                'message' => 'Password berhasil diubah. Silakan login kembali.',
            ]);

        } catch (\Exception $e) {
            Log::error('Change Password Error: ' . $e->getMessage());

            return response()->json([
                'response_code' => 500,
                'status' => 'error',
                'message' => 'Terjadi kesalahan saat mengubah password',
            ], 500);
        }
    }
}