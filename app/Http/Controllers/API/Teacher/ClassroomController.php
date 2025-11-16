<?php

namespace App\Http\Controllers\Api\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Classroom;
use App\Traits\ApiResponse;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ClassroomController extends Controller
{
    use ApiResponse; 

    public function index()
    {
        try {
            $classes = Classroom::all();
            
            return $this->success($classes, 'Data kelas berhasil diambil.');

        } catch (Exception $e) {
            return $this->error('Gagal mengambil data: ' . $e->getMessage());
        }
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255|unique:classrooms', 
        ]);

        try {
            $classroom = Classroom::create($validatedData);

            return $this->success($classroom, 'Kelas baru berhasil ditambahkan.', 201);

        } catch (Exception $e) {
            return $this->error('Gagal menyimpan data: ' . $e->getMessage());
        }
    }

    public function show(Classroom $classroom)
    {
        return $this->success($classroom, 'Detail kelas berhasil diambil.');
    }

    public function update(Request $request, Classroom $classroom)
    {
        $validatedData = $request->validate([
            'name' => [
                'required',
                'string',
                'max:255',
                Rule::unique('classrooms')->ignore($classroom->id),
            ],
        ]);

        try {
            $classroom->update($validatedData);

            return $this->success($classroom, 'Kelas berhasil diperbarui.');

        } catch (Exception $e) {
            return $this->error('Gagal memperbarui data: ' . $e->getMessage());
        }
    }

    public function destroy(Classroom $classroom)
    {
        try {
            $classroom->delete();

            return $this->success(null, 'Kelas berhasil dihapus.');
            
        } catch (Exception $e) {
            return $this->error('Gagal menghapus data: ' . $e->getMessage());
        }
    }
}