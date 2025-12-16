<?php

namespace App\Http\Controllers\Api\Student;

use App\Http\Controllers\Controller;
use App\Models\Classroom; 
use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Exception;

class StudentClassroomController extends Controller
{
    use ApiResponse;

    public function index()
    {
        try {
            $user = auth()->user();
    
            $classInfo = null;
            if ($user->selected_class_id) {
                $classInfo = Classroom::find($user->selected_class_id);
            }

            return $this->success([
                'user_id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'has_selected_class' => !is_null($user->selected_class_id),
                'class_info' => $classInfo
            ], 'Data dashboard siswa berhasil diambil.');

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
        try {
            $validator = Validator::make($request->all(), [
                'class_id' => 'required|exists:classrooms,id',
            ]);

            if ($validator->fails()) {
                return $this->error('Validasi gagal', 400);
            }

            $user = $request->user();

            $user->selected_class_id = $request->input('class_id');
            $user->save();

            $selectedClass = Classroom::find($user->selected_class_id);

            return $this->success([
                'user_id' => $user->id,
                'selected_class' => $selectedClass
            ], 'Berhasil bergabung ke kelas ' . $selectedClass->name);

        } catch (Exception $e) {
            return $this->error('Gagal memilih kelas: ' . $e->getMessage());
        }
    }
}