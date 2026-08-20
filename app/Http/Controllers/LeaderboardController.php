<?php

namespace App\Http\Controllers;

use App\Models\LabResult;
use App\Models\User;
use Illuminate\Contracts\View\View;

class LeaderboardController extends Controller
{
    public function index(): View
    {
        $students = User::query()
            ->where('role', 'student')
            ->with(['labResults.lab'])
            ->get()
            ->map(function (User $student) {
                $results = $student->labResults;
                $attempts = $results->count();
                $passed = $results->filter(fn (LabResult $result) => $result->is_passed)->count();

                $averageScore = $attempts > 0 ? round((float) $results->avg('score'), 1) : 0;
                $bestScore = $attempts > 0 ? (int) $results->max('score') : 0;
                $passRate = $attempts > 0 ? round(($passed / $attempts) * 100, 1) : 0;

                $latestResult = $results
                    ->sortByDesc(fn (LabResult $result) => $result->submitted_at ?? $result->created_at)
                    ->first();

                return [
                    'id' => $student->id,
                    'name' => $student->name,
                    'email' => $student->email,
                    'attempts' => $attempts,
                    'passed' => $passed,
                    'average_score' => $averageScore,
                    'best_score' => $bestScore,
                    'pass_rate' => $passRate,
                    'latest_lab' => $latestResult?->lab?->title ?? '-',
                    'latest_score' => $latestResult?->score ?? '-',
                    'latest_time' => $latestResult
                        ? ($latestResult->submitted_at ?? $latestResult->created_at)?->format('d M Y H:i')
                        : '-',
                ];
            })
            ->sortByDesc('average_score')
            ->sortByDesc('pass_rate')
            ->values()
            ->map(function (array $student, int $index) {
                $student['rank'] = $index + 1;
                return $student;
            });

        $topStudent = $students->first();
        $totalStudents = $students->count();
        $averageClassScore = $students->count() > 0 ? round((float) $students->avg('average_score'), 1) : 0;
        $totalAttempts = $students->sum('attempts');
        $classPassRate = $totalAttempts > 0 ? round(($students->sum('passed') / $totalAttempts) * 100, 1) : 0;

        return view('leaderboard.index', compact(
            'students',
            'topStudent',
            'totalStudents',
            'averageClassScore',
            'totalAttempts',
            'classPassRate'
        ));
    }
}
