<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Lab;
use App\Models\LabResult;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(): View
    {
        $user = Auth::user();

        return $user->isAdmin()
            ? $this->adminDashboard()
            : $this->studentDashboard();
    }

    private function adminDashboard(): View
    {
        $totalStudents = User::query()
            ->where('role', 'student')
            ->count();

        $totalLabs = Lab::query()->count();
        $totalAssessments = LabResult::query()->count();
        $averageScore = round((float) LabResult::query()->avg('score'), 1);

        $passedAssessments = LabResult::query()
            ->where(function ($query) {
                $query->where('score', '>=', 75)
                    ->orWhereIn('status', [
                        'pass',
                        'passed',
                        'success',
                        'completed',
                        'lulus',
                    ]);
            })
            ->count();

        $passRate = $totalAssessments > 0
            ? round(($passedAssessments / $totalAssessments) * 100, 1)
            : 0;

        $recentResults = LabResult::query()
            ->with(['user', 'lab.course'])
            ->latest('id')
            ->limit(8)
            ->get();

        return view('admin.dashboard', compact(
            'totalStudents',
            'totalLabs',
            'totalAssessments',
            'averageScore',
            'passedAssessments',
            'passRate',
            'recentResults',
        ));
    }

    private function studentDashboard(): View
    {
        $user = Auth::user();

        $progresses = $user->progresses()
            ->with('lesson')
            ->latest('id')
            ->get();

        $totalScore = (int) $progresses->sum('score');
        $completedLabs = $progresses
            ->where('completed', true)
            ->count();

        $courses = Course::query()
            ->withCount('labs')
            ->get();

        $assessmentResults = $user->labResults()
            ->with('lab.course')
            ->latest('id')
            ->limit(6)
            ->get();

        $assessmentCount = $user->labResults()->count();
        $averageAssessment = round(
            (float) $user->labResults()->avg('score'),
            1
        );

        return view('student.dashboard', compact(
            'progresses',
            'totalScore',
            'completedLabs',
            'courses',
            'assessmentResults',
            'assessmentCount',
            'averageAssessment',
        ));
    }
}
