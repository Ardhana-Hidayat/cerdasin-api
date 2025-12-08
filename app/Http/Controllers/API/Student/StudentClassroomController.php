<?php

namespace App\Http\Controllers\Api\Student;

use App\Http\Controllers\Controller;
use App\Models\Classroom; 
use App\Traits\ApiResponse;
use Exception;
use Illuminate\Http\Request;

class StudentClassroomController extends Controller
{
    use ApiResponse;

    public function index()
    {
        try {
            $user = auth()->user();
    
            if ($user->selected_class_id) {
                $user->load('selectedClass');
            }
        } catch (Exception $e) {
            return $this->error('Gagal mengambil data siswa: ' . $e->getMessage());
        }
    }

    public function getClassrooms()
    {
        try {
            $classrooms = Classroom::all();

            return $this->success($classrooms, 'Daftar semua kelas berhasil diambil.');

        } catch (Exception $e) {
            return $this->error('Gagal mengambil daftar kelas: ' . $e->getMessage());
        }
    }

    public function selectClass(Request $request)
    {
        $request->validate([
            'class_id' => 'required|exists:classrooms,id',
        ]);

        try {
            $user = $request->user();

            $user->selected_class_id = $request->input('class_id');
            $user->save();

            $user->load('selectedClass');

            return $this->success([
                'user' => $user,
                'selected_class' => $user->selectedClass
            ], 'Kelas berhasil dipilih!');

        } catch (Exception $e) {
            return $this->error('Gagal memilih kelas: ' . $e->getMessage());
        }
    }
}