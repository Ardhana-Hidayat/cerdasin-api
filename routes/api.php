<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthenticationController;
use App\Http\Controllers\API\Teacher\ClassroomController;

Route::post('register', [AuthenticationController::class, 'register'])->name('api.register');
Route::post('login', [AuthenticationController::class, 'login'])->name('api.login');

Route::middleware('auth:sanctum')->group(function () {

    Route::get('user', [AuthenticationController::class, 'userInfo'])->name('api.user.info');
    Route::post('logout', [AuthenticationController::class, 'logout'])->name('api.logout');

    Route::middleware('role:teacher')->prefix('teacher')->name('teacher.')->group(function () {
        Route::apiResource('classrooms', ClassroomController::class);
    });

    Route::middleware('role:student')->prefix('student')->name('student.')->group(function () {
        // Isi route untuk student nanti
    });
});
