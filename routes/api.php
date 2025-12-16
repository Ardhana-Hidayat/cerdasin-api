<?php

use App\Http\Controllers\Api\Student\StudentClassroomController;
use App\Http\Controllers\Api\Student\StudentMaterialController;
use App\Http\Controllers\Api\Student\StudentQuizController;
use App\Http\Controllers\Api\Student\StudentScoreController;
use App\Http\Controllers\API\Teacher\MaterialController;
use App\Http\Controllers\API\Teacher\QuizController;
use App\Http\Controllers\API\Teacher\QuestionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthenticationController;
use App\Http\Controllers\API\Teacher\ClassroomController;

Route::post('register', [AuthenticationController::class, 'register'])->name('api.register');
Route::post('login', [AuthenticationController::class, 'login'])->name('api.login');

Route::middleware('auth:sanctum')->group(function () {

    Route::get('user-info', [AuthenticationController::class, 'userInfo']);
    Route::post('logout', [AuthenticationController::class, 'logOut']);
    Route::post('change-password', [AuthenticationController::class, 'changePassword']);

    Route::middleware('role:teacher')->prefix('teacher')->name('teacher.')->group(function () {
        Route::apiResource('classrooms', ClassroomController::class);
        Route::apiResource('materials', MaterialController::class)->except(['update']);
        Route::post('materials/{material}', [MaterialController::class, 'update'])->name('materials.update');
        Route::apiResource('quizzes', QuizController::class);
        Route::apiResource('quizzes.questions', QuestionController::class);
    });

    Route::middleware('role:student')->prefix('student')->name('student.')->group(function () {
        
        Route::get('dashboard', [StudentClassroomController::class, 'index']);
        Route::get('classrooms', [StudentClassroomController::class, 'getClassrooms']);
        Route::post('select-class', [StudentClassroomController::class, 'selectClass']);

        Route::middleware(['class.selected'])->group(function () {

            Route::get('materials', [StudentMaterialController::class, 'index']);
            Route::get('materials/{material}', [StudentMaterialController::class, 'show']);
            Route::get('quizzes', [StudentQuizController::class, 'index']);
            Route::get('quizzes/{quiz}', [StudentQuizController::class, 'show']);
            Route::post('quizzes/{quiz}/submit', [StudentQuizController::class, 'submit']);
            Route::get('scores/{score}', [StudentScoreController::class, 'show']);
        });
    });
});
