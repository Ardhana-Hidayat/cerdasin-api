<?php

namespace App\Http\Controllers\Api\Student;

use App\Http\Controllers\Controller;
use App\Models\Score;
use App\Traits\ApiResponse;
use Exception;

class StudentScoreController extends Controller
{
    use ApiResponse;

    public function show(Score $score)
    {
        try {
            $user = auth()->user();
            
            if ($user->id != $score->user_id) {
                return $this->error('Akses ditolak.', 403);
            }
            
            $score->load('quiz');

            return $this->success($score, 'Data skor berhasil diambil.');
        } catch (Exception $e) {
            return $this->error('Gagal mengambil data skor: ' . $e->getMessage());
        }
    }
}