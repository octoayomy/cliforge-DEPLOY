<?php

namespace App\Http\Controllers;

use App\Models\LabResult;
use Illuminate\Contracts\View\View;

class EvidenceController extends Controller
{
    public function show(LabResult $labResult): View
    {
        $user = auth()->user();

        if ($user->isStudent() && $labResult->user_id !== $user->id) {
            abort(403, 'Anda hanya dapat melihat evidence milik sendiri.');
        }

        $labResult->load([
            'user',
            'lab.course',
            'detailsRecords',
        ]);

        $details = $labResult->detailsRecords;

        $totalRules = $details->count();

        $passedRules = $details
            ->filter(fn ($detail) => strtoupper((string) $detail->status) === 'PASS')
            ->count();

        $failedRules = $details
            ->filter(fn ($detail) => strtoupper((string) $detail->status) === 'FAIL')
            ->count();

        $passRate = $totalRules > 0
            ? round(($passedRules / $totalRules) * 100, 1)
            : 0;

        $failedDetails = $details
            ->filter(fn ($detail) => strtoupper((string) $detail->status) === 'FAIL')
            ->values();

        $recommendations = $this->buildRecommendations($failedDetails);

        return view('evidence.show', compact(
            'labResult',
            'details',
            'totalRules',
            'passedRules',
            'failedRules',
            'passRate',
            'failedDetails',
            'recommendations'
        ));
    }

    private function buildRecommendations($failedDetails)
    {
        if ($failedDetails->isEmpty()) {
            return collect([
                'Seluruh rule validasi berhasil dipenuhi. Siswa telah menunjukkan keterampilan praktik yang baik pada lab ini.',
            ]);
        }

        return $failedDetails
            ->map(function ($detail) {
                $ruleName = $detail->rule_name;
                $type = strtoupper((string) $detail->type);

                return match (strtolower((string) $detail->type)) {
                    'service' => "Periksa kembali status layanan pada rule {$ruleName}. Pastikan service sudah aktif dan berjalan sesuai instruksi.",
                    'file' => "Periksa kembali file konfigurasi pada rule {$ruleName}. Pastikan file sudah dibuat di lokasi yang benar.",
                    'port' => "Periksa kembali port layanan pada rule {$ruleName}. Pastikan service sudah berjalan dan membuka port yang sesuai.",
                    'command' => "Periksa kembali hasil perintah pada rule {$ruleName}. Output aktual belum sesuai dengan output yang diharapkan.",
                    default => "Periksa kembali rule {$ruleName} ({$type}) karena hasil validasi belum sesuai dengan kriteria.",
                };
            })
            ->unique()
            ->values();
    }
}