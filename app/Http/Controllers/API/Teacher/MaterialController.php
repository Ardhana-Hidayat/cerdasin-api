<?php

namespace App\Http\Controllers\API\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Material;
use App\Traits\ApiResponse;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MaterialController extends Controller
{
    use ApiResponse;

    public function index()
    {
        try {
            $materials = Material::with('classroom')->latest()->get();
            return $this->success($materials, 'Data materi berhasil diambil.');
        } catch (Exception $e) {
            return $this->error('Gagal mengambil data materi: ' . $e->getMessage());
        }
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

        try {
            if ($request->hasFile('thumbnail')) {
                $validatedData['thumbnail'] = $request->file('thumbnail')->store('thumbnails', 'public');
            }

            if ($request->hasFile('file_path')) {
                $validatedData['file_path'] = $request->file('file_path')->store('materials', 'public');
            }

            $material = Material::create($validatedData);
            return $this->success($material, 'Materi berhasil ditambahkan.', 201);

        } catch (Exception $e) {
            return $this->error('Gagal menyimpan materi: ' . $e->getMessage());
        }
    }

    public function show(Material $material)
    {
        try {
            $material->load('classroom');
            return $this->success($material, 'Detail materi berhasil diambil.');
        } catch (Exception $e) {
             return $this->error('Gagal mengambil data: ' . $e->getMessage());
        }
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

        try {
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
            return $this->success($material, 'Materi berhasil diperbarui.');

        } catch (Exception $e) {
            return $this->error('Gagal memperbarui materi: ' . $e->getMessage());
        }
    }

    public function destroy(Material $material)
    {
        try {
            if ($material->thumbnail) {
                Storage::disk('public')->delete($material->thumbnail);
            }
            if ($material->file_path) {
                Storage::disk('public')->delete($material->file_path);
            }

            $material->delete();
            return $this->success(null, 'Materi berhasil dihapus.');

        } catch (Exception $e) {
            return $this->error('Gagal menghapus materi: ' . $e->getMessage());
        }
    }
}