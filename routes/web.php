<?php

use App\Http\Controllers\Admin\DeviceManagementController;
use App\Http\Controllers\Admin\LessonController as AdminLessonController;
use App\Http\Controllers\AnalyticsController;
use App\Http\Controllers\AssessmentController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LeaderboardController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProgressController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EvidenceController;
use App\Http\Controllers\LabResultController;
use App\Http\Controllers\ValidatorCalibrationController;

Route::redirect('/', '/dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/courses', [CourseController::class, 'index'])->name('courses');
    Route::get('/courses/{id}', [CourseController::class, 'show'])->name('courses.show');
    Route::get('/lessons/{id}', [LessonController::class, 'show'])->name('lessons.show');
    Route::post('/progress/store', [ProgressController::class, 'store'])->name('progress.store');
    Route::get('/leaderboard', [LeaderboardController::class, 'index'])->name('leaderboard');

    Route::get('/assessment', [AssessmentController::class, 'index'])->name('assessment.index');
    Route::get('/assessment/{labResult}', [AssessmentController::class, 'show'])->name('assessment.show');
    Route::get('/assessment/{labResult}/evidence', [EvidenceController::class, 'show'])->name('evidence.show');
    Route::get('/labs/{lab}/latest-result', [\App\Http\Controllers\LabResultController::class, 'latest'])->name('labs.latest-result');
    Route::middleware(['auth'])->group(function () {Route::get('/validator-calibration', [ValidatorCalibrationController::class, 'index'])->name('validator-calibration.index');
    Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/validator-calibration', [ValidatorCalibrationController::class, 'index'])
        ->name('validator-calibration.index');

    Route::get('/validator-calibration/report', [ValidatorCalibrationController::class, 'report'])
        ->name('validator-calibration.report');
});

});

    Route::middleware('role:admin')->group(function () {
        Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
        Route::get('/analytics', [AnalyticsController::class, 'index'])->name('analytics.index');

        Route::prefix('admin')->name('admin.')->group(function () {
            Route::resource('lessons', AdminLessonController::class);

            Route::get('/devices', [DeviceManagementController::class, 'index'])->name('devices.index');
            Route::get('/devices/{device}', [DeviceManagementController::class, 'show'])->name('devices.show');
            Route::post('/devices/{device}/approve', [DeviceManagementController::class, 'approve'])->name('devices.approve');
            Route::post('/devices/{device}/reject', [DeviceManagementController::class, 'reject'])->name('devices.reject');
            Route::post('/devices/{device}/revoke', [DeviceManagementController::class, 'revoke'])->name('devices.revoke');
        });
    });

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
