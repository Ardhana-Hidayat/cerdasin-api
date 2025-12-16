<?php

namespace App\Http\Controllers\Api\Student;

use App\Http\Controllers\Controller;
use App\Models\Quiz;
use App\Models\Score;
use App\Traits\ApiResponse;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentQuizController extends Controller
{
    use ApiResponse;

    public function index()
    {
        $user = Auth::user();

        $quizzes = Quiz::where('classroom_id', $user->selected_class_id)->get();

        return response()->json([
            'response_code' => 200,
            'status' => 'success',
            'message' => 'Daftar kuis berhasil diambil',
            'data' => $quizzes
        ]);
    }

    public function show(Quiz $quiz)
    {
        try {
            $user = auth()->user();
            $selectedClassId = $user->selected_class_id;

            if ($quiz->classroom_id != $selectedClassId) {
                return $this->error('Akses ditolak. Kuis ini bukan bagian dari kelas Anda.', 403);
            }

            $quiz->load('questions');
            return $this->success($quiz, 'Detail kuis berhasil diambil.');

        } catch (Exception $e) {
            return $this->error('Gagal mengambil detail kuis: ' . $e->getMessage());
        }
    }

    public function submit(Request $request, Quiz $quiz)
    {
        $request->validate([
            'answers' => 'required|array'
        ]);

        try {
            $user = auth()->user();
            $selectedClassId = $user->selected_class_id;

            if ($quiz->classroom_id != $selectedClassId) {
                return $this->error('Akses ditolak. Kuis ini bukan bagian dari kelas Anda.', 403);
            }

            $correctAnswers = $quiz->questions()->pluck('correct_answer', 'id');
            $submittedAnswers = $request->input('answers');
            $correctCount = 0;
            $totalCount = $correctAnswers->count();

            foreach ($correctAnswers as $questionId => $correctAnswer) {
                if (isset($submittedAnswers[$questionId])) {
                    if ($submittedAnswers[$questionId] == $correctAnswer) {
                        $correctCount++;
                    }
                }
            }

            $scorePercentage = ($totalCount > 0) ? round(($correctCount / $totalCount) * 100) : 0;

            $score = Score::updateOrCreate(
                [
                    'user_id' => $user->id,
                    'quiz_id' => $quiz->id
                ],
                [
                    'score' => $scorePercentage,
                    'correct_count' => $correctCount,
                    'total_count' => $totalCount
                ]
            );

            return $this->success($score, 'Kuis berhasil disubmit.');

        } catch (Exception $e) {
            return $this->error('Gagal submit kuis: ' . $e->getMessage());
        }
    }
}