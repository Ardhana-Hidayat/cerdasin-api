<?php

namespace App\Http\Controllers\Api\Student;

use App\Http\Controllers\Controller;
use App\Models\Material;
use App\Traits\ApiResponse;
use Exception;
use Illuminate\Support\Facades\Auth;

class StudentMaterialController extends Controller
{
    use ApiResponse;

    public function index()
    {
        $user = Auth::user();

        $materials = Material::where('classroom_id', $user->selected_class_id)->get();

        return response()->json([
            'response_code' => 200,
            'status' => 'success',
            'message' => 'Daftar materi berhasil diambil',
            'data' => $materials
        ]);
    }

    public function show(Material $material)
    {
        try {
            $user = auth()->user();
            $selectedClassId = $user->selected_class_id;

            if ($material->classroom_id != $selectedClassId) {
                return $this->error('Akses ditolak. Materi ini bukan bagian dari kelas Anda.', 403);
            }

            return $this->success($material, 'Detail materi berhasil diambil.');

        } catch (Exception $e) {
            return $this->error('Gagal mengambil detail materi: ' . $e->getMessage());
        }
    }
}