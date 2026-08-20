<?php

namespace App\Http\Controllers;

use App\Models\Lab;
use App\Models\LabResult;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;

class AnalyticsController extends Controller
{
    public function index(): View
    {
        $results = LabResult::query()
            ->with(['user', 'lab'])
            ->get();

        $totalAttempts = $results->count();
        $averageScore = round((float) $results->avg('score'), 1);

        $passedAttempts = $results
            ->filter(fn (LabResult $result) => $result->is_passed)
            ->count();

        $passRate = $totalAttempts > 0
            ? round(($passedAttempts / $totalAttempts) * 100, 1)
            : 0;

        $activeStudents = $results
            ->pluck('user_id')
            ->filter()
            ->unique()
            ->count();

        $assessmentToday = $results
            ->filter(function (LabResult $result) {
                $timestamp = $result->submitted_at ?? $result->created_at;
                return $timestamp && $timestamp->isToday();
            })
            ->count();

        $averageDuration = round((float) $results->avg('duration'), 1);

        $failedValidationRules = $this->buildFailedValidationRules($results);

        $recentResults = $results
            ->sortByDesc(fn (LabResult $result) => $result->submitted_at ?? $result->created_at)
            ->take(8)
            ->values();

        $studentPerformance = User::query()
            ->where('role', 'student')
            ->with('labResults')
            ->get()
            ->map(function (User $student) {
                $attempts = $student->labResults->count();

                $passed = $student->labResults
                    ->filter(fn (LabResult $result) => $result->is_passed)
                    ->count();

                return [
                    'id' => $student->id,
                    'name' => $student->name,
                    'email' => $student->email,
                    'attempts' => $attempts,
                    'passed' => $passed,
                    'average' => round((float) $student->labResults->avg('score'), 1),
                    'pass_rate' => $attempts > 0
                        ? round(($passed / $attempts) * 100, 1)
                        : 0,
                ];
            })
            ->sortByDesc('average')
            ->values()
            ->take(10);

        $labPerformance = Lab::query()
            ->with('results')
            ->get()
            ->map(function (Lab $lab) {
                $attempts = $lab->results->count();

                $passed = $lab->results
                    ->filter(fn (LabResult $result) => $result->is_passed)
                    ->count();

                return [
                    'id' => $lab->id,
                    'title' => $lab->title,
                    'attempts' => $attempts,
                    'average' => round((float) $lab->results->avg('score'), 1),
                    'average_duration' => round((float) $lab->results->avg('duration'), 1),
                    'pass_rate' => $attempts > 0
                        ? round(($passed / $attempts) * 100, 1)
                        : 0,
                ];
            })
            ->sortByDesc('attempts')
            ->values();

        $timeline = $this->buildSevenDayTimeline($results);

        return view('analytics.index', compact(
            'totalAttempts',
            'averageScore',
            'passedAttempts',
            'passRate',
            'activeStudents',
            'assessmentToday',
            'averageDuration',
            'failedValidationRules',
            'recentResults',
            'studentPerformance',
            'labPerformance',
            'timeline',
        ));
    }

    private function buildFailedValidationRules(Collection $results): Collection
    {
        $rules = collect();

        foreach ($results as $result) {
            $details = $result->details;

            if (! is_array($details)) {
                continue;
            }

            foreach ($details as $detail) {
                $status = strtoupper((string) ($detail['status'] ?? ''));

                if ($status !== 'FAIL') {
                    continue;
                }

                $name = $detail['name']
                    ?? $detail['rule']
                    ?? $detail['description']
                    ?? 'Unknown Rule';

                $type = $detail['type'] ?? '-';

                $key = $name.'|'.$type;

                if (! $rules->has($key)) {
                    $rules->put($key, [
                        'name' => $name,
                        'type' => $type,
                        'failed' => 0,
                        'total' => 0,
                        'latest_actual' => $detail['actual'] ?? '-',
                        'latest_expected' => $detail['expected'] ?? '-',
                    ]);
                }

                $item = $rules->get($key);
                $item['failed']++;
                $item['total']++;
                $item['latest_actual'] = $detail['actual'] ?? '-';
                $item['latest_expected'] = $detail['expected'] ?? '-';

                $rules->put($key, $item);
            }
        }

        return $rules
            ->values()
            ->sortByDesc('failed')
            ->take(10)
            ->values();
    }

    private function buildSevenDayTimeline(Collection $results): Collection
    {
        $days = collect(range(6, 0))
            ->map(fn (int $day) => Carbon::today()->subDays($day));

        $timeline = $days->map(function (Carbon $date) use ($results) {
            $dailyResults = $results->filter(function (LabResult $result) use ($date) {
                $timestamp = $result->submitted_at ?? $result->created_at;

                return $timestamp && $timestamp->isSameDay($date);
            });

            return [
                'date' => $date->format('Y-m-d'),
                'label' => $date->translatedFormat('D, d M'),
                'attempts' => $dailyResults->count(),
                'average' => round((float) $dailyResults->avg('score'), 1),
            ];
        });

        $maximum = max(1, (int) $timeline->max('attempts'));

        return $timeline->map(function (array $item) use ($maximum) {
            $item['percentage'] = round(
                ($item['attempts'] / $maximum) * 100,
                1
            );

            return $item;
        });
    }
}