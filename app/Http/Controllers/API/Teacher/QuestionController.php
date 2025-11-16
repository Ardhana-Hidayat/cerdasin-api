<?php

namespace App\Http\Controllers\API\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Question;
use App\Models\Quiz;
use App\Traits\ApiResponse;
use Exception;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    use ApiResponse;

    public function index(Quiz $quiz)
    {
        try {
            $quiz->load('questions'); 
            return $this->success($quiz->questions, 'Data pertanyaan berhasil diambil.');
        } catch (Exception $e) {
            return $this->error('Gagal mengambil data pertanyaan: ' . $e->getMessage());
        }
    }

    public function store(Request $request, Quiz $quiz)
    {
        $validatedData = $request->validate([
            'question' => 'required|string',
            'option_a' => 'required|string',
            'option_b' => 'required|string',
            'option_c' => 'required|string',
            'option_d' => 'required|string',
            'correct_answer' => 'required|in:a,b,c,d', 
        ]);

        try {
            $question = $quiz->questions()->create($validatedData);
            return $this->success($question, 'Pertanyaan berhasil ditambahkan.', 201);
        } catch (Exception $e) {
            return $this->error('Gagal menyimpan pertanyaan: ' . $e->getMessage());
        }
    }

    public function show(Question $question)
    {
        try {
            return $this->success($question, 'Detail pertanyaan berhasil diambil.');
        } catch (Exception $e) {
            return $this->error('Gagal mengambil detail pertanyaan: ' . $e->getMessage());
        }
    }

    public function update(Request $request, Question $question)
    {
        $validatedData = $request->validate([
            'question' => 'required|string',
            'option_a' => 'required|string',
            'option_b' => 'required|string',
            'option_c' => 'required|string',
            'option_d' => 'required|string',
            'correct_answer' => 'required|in:a,b,c,d',
        ]);

        try {
            $question->update($validatedData);
            return $this->success($question, 'Pertanyaan berhasil diperbarui.');
        } catch (Exception $e) {
            return $this->error('Gagal memperbarui pertanyaan: ' . $e->getMessage());
        }
    }

    public function destroy(Question $question)
    {
        try {
            $question->delete();
            return $this->success(null, 'Pertanyaan berhasil dihapus.');
        } catch (Exception $e) {
            return $this->error('Gagal menghapus pertanyaan: ' . $e->getMessage());
        }
    }
}