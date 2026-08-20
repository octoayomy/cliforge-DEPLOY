<?php

namespace App\Http\Controllers;

use App\Models\Lab;
use App\Models\LabResult;
use Illuminate\Http\JsonResponse;

class LabResultController extends Controller
{
    public function latest(Lab $lab): JsonResponse
    {
        $query = LabResult::query()
            ->with('detailsRecords')
            ->where('lab_id', $lab->id)
            ->latest('submitted_at')
            ->latest('id');

        if (auth()->user()->isStudent()) {
            $query->where('user_id', auth()->id());
        }

        $result = $query->first();

        if (! $result) {
            return response()->json([
                'success' => false,
                'message' => 'Belum ada hasil dari CLIForge Agent. Jalankan cliforge check di VM terlebih dahulu.',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'score' => $result->score,
            'status' => $result->status_label,
            'submitted_at' => ($result->submitted_at ?? $result->created_at)?->format('d M Y H:i'),
            'detail_url' => route('assessment.show', $result),
            'evidence_url' => route('evidence.show', $result),
            'details' => $result->detailsRecords->map(fn ($detail) => [
                'rule_name' => $detail->rule_name,
                'status' => $detail->status,
                'expected' => $detail->expected,
                'actual' => $detail->actual,
            ])->values(),
        ]);
    }
}