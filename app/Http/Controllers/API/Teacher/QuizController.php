<?php

namespace App\Http\Controllers\API\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Quiz;
use App\Traits\ApiResponse;
use Exception;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    use ApiResponse;

    public function index()
    {
        try {
            $quizzes = Quiz::with('classroom')->latest()->get();
            return $this->success($quizzes, 'Data kuis berhasil diambil.');
        } catch (Exception $e) {
            return $this->error('Gagal mengambil data kuis: ' . $e->getMessage());
        }
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'classroom_id' => 'required|exists:classrooms,id',
        ]);

        try {
            $quiz = Quiz::create($validatedData);
            return $this->success($quiz, 'Kuis berhasil ditambahkan.', 201);
        } catch (Exception $e) {
            return $this->error('Gagal menyimpan kuis: ' . $e->getMessage());
        }
    }

    public function show(Quiz $quiz)
    {
        try {
            $quiz->load('classroom', 'questions');
            return $this->success($quiz, 'Detail kuis berhasil diambil.');
        } catch (Exception $e) {
            return $this->error('Gagal mengambil detail kuis: ' . $e->getMessage());
        }
    }

    public function update(Request $request, Quiz $quiz)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'classroom_id' => 'required|exists:classrooms,id',
        ]);

        try {
            $quiz->update($validatedData);
            return $this->success($quiz, 'Kuis berhasil diperbarui.');
        } catch (Exception $e) {
            return $this->error('Gagal memperbarui kuis: ' . $e->getMessage());
        }
    }

    public function destroy(Quiz $quiz)
    {
        try {
            $quiz->questions()->delete();
            $quiz->delete();
            return $this->success(null, 'Kuis dan semua pertanyaannya berhasil dihapus.');
        } catch (Exception $e) {
            return $this->error('Gagal menghapus kuis: ' . $e->getMessage());
        }
    }
}