<?php

namespace App\Http\Controllers;

use App\Models\ValidatorCalibration;
use Illuminate\Contracts\View\View;

class ValidatorCalibrationController extends Controller
{
    public function index(): View
    {
        $rows = ValidatorCalibration::with(['labResult.user', 'labResult.lab'])
            ->latest()
            ->paginate(20);

        $summary = $this->summary();

        $byRule = ValidatorCalibration::query()
            ->selectRaw('rule_name')
            ->selectRaw('SUM(CASE WHEN is_agreement = 1 THEN 1 ELSE 0 END) as agreement_count')
            ->selectRaw('SUM(CASE WHEN is_agreement = 0 THEN 1 ELSE 0 END) as disagreement_count')
            ->groupBy('rule_name')
            ->orderBy('rule_name')
            ->get()
            ->map(function ($item) {
                $total = (int) $item->agreement_count + (int) $item->disagreement_count;

                return [
                    'rule_name' => $item->rule_name,
                    'agreement' => (int) $item->agreement_count,
                    'disagreement' => (int) $item->disagreement_count,
                    'percent' => $total > 0 ? round(((int) $item->agreement_count / $total) * 100, 2) : 0,
                ];
            });

        return view('validator-calibration.index', array_merge($summary, [
            'rows' => $rows,
            'byRule' => $byRule,
        ]));
    }

    public function report()
    {
        $rows = ValidatorCalibration::with(['labResult.user', 'labResult.lab'])
            ->orderBy('lab_result_id')
            ->orderBy('rule_name')
            ->get();

        $data = array_merge($this->summary(), [
            'rows' => $rows,
            'generatedAt' => now(),
        ]);

        if (class_exists(\Barryvdh\DomPDF\Facade\Pdf::class)) {
            return \Barryvdh\DomPDF\Facade\Pdf::loadView('validator-calibration.report-pdf', $data)
                ->setPaper('a4', 'portrait')
                ->download('laporan-kalibrasi-validator-cliforge.pdf');
        }

        return view('validator-calibration.report-pdf', $data);
    }

    private function summary(): array
    {
        $agreement = ValidatorCalibration::where('is_agreement', true)->count();
        $disagreement = ValidatorCalibration::where('is_agreement', false)->count();
        $total = $agreement + $disagreement;
        $pa = $total > 0 ? round(($agreement / $total) * 100, 2) : 0;

        return [
            'agreement' => $agreement,
            'disagreement' => $disagreement,
            'total' => $total,
            'pa' => $pa,
            'isEligible' => $pa >= 90,
        ];
    }
}
