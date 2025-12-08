<?php

namespace App\Http\Controllers\Api\Student;

use App\Http\Controllers\Controller;
use App\Models\Score;
use App\Traits\ApiResponse;
use Exception;

class StudentScoreController extends Controller
{
    use ApiResponse;

    public function show($id)
    {
        try {
            $score = Score::with('quiz')->find($id);

            if (!$score) {
                return $this->error('Data nilai tidak ditemukan.', 404);
            }

            $user = auth()->user();
            if ($score->user_id != $user->id) {
                return $this->error('Akses ditolak. Ini bukan nilai Anda.', 403);
            }

            return $this->success($score, 'Detail nilai berhasil diambil.');

        } catch (Exception $e) {
            return $this->error('Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}