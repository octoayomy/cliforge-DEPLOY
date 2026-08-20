<?php

require __DIR__ . '/../vendor/autoload.php';

$app = require __DIR__ . '/../bootstrap/app.php';

$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

$results = App\Models\LabResult::with('detailsRecords')->take(5)->get();

foreach ($results as $result) {
    foreach ($result->detailsRecords as $detail) {
        $agent = strtoupper($detail->status);
        $teacher = $agent;

        if ($detail->rule_name === 'DNS Resolution' && $result->id % 2 == 0) {
            $teacher = ($agent === 'PASS') ? 'FAIL' : 'PASS';
        }

        App\Models\ValidatorCalibration::updateOrCreate(
            [
                'lab_result_id' => $result->id,
                'rule_name' => $detail->rule_name,
            ],
            [
                'teacher_decision' => $teacher,
                'agent_decision' => $agent,
                'is_agreement' => ($teacher === $agent),
                'note' => ($teacher === $agent)
                    ? 'Keputusan guru dan Agent sesuai.'
                    : 'Perlu peninjauan rule validator.',
            ]
        );
    }
}

echo "SELESAI\n";
echo "Total Calibration: " . App\Models\ValidatorCalibration::count() . "\n";