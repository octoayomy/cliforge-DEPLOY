<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Lab;
use App\Models\LabResult;
use App\Models\LabResultDetail;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AgentController extends Controller
{
    public function validateAgent(Request $request)
    {
        return response()->json([
            'success' => true,
            'message' => 'CLIForge Agent Connected',
        ]);
    }

    public function submit(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|integer|exists:users,id',
            'lab' => 'required|string',
            'score' => 'required|integer|min:0|max:100',
            'duration' => 'nullable|integer|min:0',
            'results' => 'required|array',
            'checked_at' => 'nullable',
        ]);

        $lab = Lab::where('title', $validated['lab'])
            ->orWhere('id', $validated['lab'])
            ->first();

        if (! $lab) {
            return response()->json([
                'success' => false,
                'message' => 'Lab not found',
                'lab' => $validated['lab'],
            ], 404);
        }

        $details = collect($validated['results'])
            ->map(function ($item) {
                return [
                    'name' => $item['name'] ?? $item['rule'] ?? 'Validation Rule',
                    'type' => $item['type'] ?? '-',
                    'status' => strtoupper($item['status'] ?? 'UNKNOWN'),
                    'expected' => $item['expected'] ?? '-',
                    'actual' => $item['actual'] ?? '-',
                    'weight' => $item['weight'] ?? 0,
                    'description' => $item['description'] ?? '-',
                    'command' => $item['command'] ?? null,
                ];
            })
            ->values()
            ->toArray();

        $hasFailedRule = collect($details)
            ->contains(fn ($item) => strtoupper($item['status']) === 'FAIL');

        $status = ($validated['score'] >= 75 && ! $hasFailedRule)
            ? 'completed'
            : 'failed';

        $submittedAt = now();

        if (! empty($validated['checked_at'])) {
            try {
                $submittedAt = Carbon::parse($validated['checked_at']);
            } catch (\Throwable $e) {
                $submittedAt = now();
            }
        }

        $result = DB::transaction(function () use ($validated, $lab, $details, $status, $submittedAt) {
            $result = LabResult::create([
                'user_id' => $validated['user_id'],
                'lab_id' => $lab->id,
                'score' => $validated['score'],
                'status' => $status,
                'duration' => $validated['duration'] ?? null,
                'details' => $details,
                'submitted_at' => $submittedAt,
            ]);

            foreach ($details as $detail) {
                LabResultDetail::create([
                    'lab_result_id' => $result->id,
                    'rule_name' => $detail['name'],
                    'type' => $detail['type'],
                    'status' => $detail['status'],
                    'expected' => $detail['expected'],
                    'actual' => $detail['actual'],
                    'weight' => (int) $detail['weight'],
                    'description' => $detail['description'],
                    'command' => $detail['command'],
                ]);
            }

            return $result;
        });

        return response()->json([
            'success' => true,
            'message' => 'Lab Submitted',
            'result_id' => $result->id,
            'status' => $result->status_label,
            'score' => $result->score,
            'detail_count' => $result->detailsRecords()->count(),
            'detail_url' => url('/assessment/'.$result->id),
        ]);
    }
}