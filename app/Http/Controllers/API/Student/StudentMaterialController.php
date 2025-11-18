<?php

namespace App\Http\Controllers\Api\Student;

use App\Http\Controllers\Controller;
use App\Models\Material;
use App\Traits\ApiResponse;
use Exception;

class StudentMaterialController extends Controller
{
    use ApiResponse;

    public function index()
    {
        try {
            $user = auth()->user();
            $selectedClassId = $user->selected_class_id;

            if (!$selectedClassId) {
                return $this->error('Silakan pilih kelas terlebih dahulu untuk melihat materi.', 400);
            }

            $materials = Material::where('classroom_id', $selectedClassId)
                ->orderBy('created_at', 'desc') 
                ->get();

            return $this->success($materials, 'Data materi berhasil diambil.');

        } catch (Exception $e) {
            return $this->error('Gagal mengambil data materi: ' . $e->getMessage());
        }
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