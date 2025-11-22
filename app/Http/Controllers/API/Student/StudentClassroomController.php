<?php

namespace App\Http\Controllers\Api\Student;

use App\Http\Controllers\Controller;
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
            return $this->success($user, 'Data siswa berhasil diambil.');
        } catch (Exception $e) {
            return $this->error('Gagal mengambil data siswa: ' . $e->getMessage());
        }
    }

    public function selectClass(Request $request)
    {
        $request->validate([
            'class_id' => 'required|exists:classrooms,id',
        ]);

        $user = $request->user();

        $user->selected_class_id = $request->input('class_id');
        $user->save();

        $user->load('selectedClass');

        return response()->json([
            'status' => 'success',
            'message' => 'Kelas berhasil dipilih!',
            'data' => [
                'user' => $user,
                'selected_class' => $user->selectedClass
            ]
        ]);
    }
}
