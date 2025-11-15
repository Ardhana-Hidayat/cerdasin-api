<?php

namespace App\Http\Controllers\Api\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Classroom;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ClassroomController extends Controller
{
    public function index()
    {
        $classes = Classroom::all();
        
        return response()->json($classes);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255|unique:classrooms', 
        ]);

        $classroom = Classroom::create($validatedData);

        return response()->json($classroom, 201);
    }

    public function show(Classroom $classroom)
    {
        return response()->json($classroom);
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

        $classroom->update($validatedData);

        return response()->json($classroom);
    }

    public function destroy(Classroom $classroom)
    {
        $classroom->delete();

        return response()->json(['message' => 'Kelas berhasil dihapus.']);
    }
}