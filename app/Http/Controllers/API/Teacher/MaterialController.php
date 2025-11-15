<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Material;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MaterialController extends Controller
{
    public function index()
    {
        $materials = Material::with('classroom')->latest()->get();
        return response()->json($materials);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'classroom_id' => 'required|exists:classrooms,id',
            'title' => 'required|string|max:255',
            'material' => 'nullable|string',
            'thumbnail' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'file_path' => 'nullable|file|mimes:pdf,doc,docx,ppt,pptx,mp4|max:5120',
        ]);

        if ($request->hasFile('thumbnail')) {
            $validatedData['thumbnail'] = $request->file('thumbnail')->store('thumbnails', 'public');
        }

        if ($request->hasFile('file_path')) {
            $validatedData['file_path'] = $request->file('file_path')->store('materials', 'public');
        }

        $material = Material::create($validatedData);

        return response()->json($material, 201);
    }

    public function show(Material $material)
    {
        return response()->json($material->load('classroom'));
    }

    public function update(Request $request, Material $material)
    {
         $validatedData = $request->validate([
            'classroom_id' => 'required|exists:classrooms,id',
            'title' => 'required|string|max:255',
            'material' => 'nullable|string',
            'thumbnail' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'file_path' => 'nullable|file|mimes:pdf,doc,docx,ppt,pptx,mp4|max:5120',
        ]);

        $dataToUpdate = $validatedData;

        if ($request->hasFile('thumbnail')) {
            if ($material->thumbnail) {
                Storage::disk('public')->delete($material->thumbnail);
            }
            $dataToUpdate['thumbnail'] = $request->file('thumbnail')->store('thumbnails', 'public');
        }

        if ($request->hasFile('file_path')) {
            if ($material->file_path) {
                Storage::disk('public')->delete($material->file_path);
            }
            $dataToUpdate['file_path'] = $request->file('file_path')->store('materials', 'public');
        }

        $material->update($dataToUpdate);

        return response()->json($material);
    }

    public function destroy(Material $material)
    {
        if ($material->thumbnail) {
            Storage::disk('public')->delete($material->thumbnail);
        }
        if ($material->file_path) {
            Storage::disk('public')->delete($material->file_path);
        }

        $material->delete();

        return response()->json(['message' => 'Materi berhasil dihapus.']);
    }
}