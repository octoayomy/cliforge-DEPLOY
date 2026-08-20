<?php

require __DIR__ . '/../vendor/autoload.php';

$app = require __DIR__ . '/../bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

use App\Models\User;
use App\Models\Lab;
use App\Models\LabResult;
use App\Models\LabResultDetail;
use App\Models\ValidatorCalibration;
use Illuminate\Support\Facades\Hash;

$students = [
    ['name' => 'Ahmad Fauzi', 'email' => 'ahmad.fauzi@cliforge.test'],
    ['name' => 'Budi Santoso', 'email' => 'budi.santoso@cliforge.test'],
    ['name' => 'Citra Lestari', 'email' => 'citra.lestari@cliforge.test'],
    ['name' => 'Dimas Pratama', 'email' => 'dimas.pratama@cliforge.test'],
    ['name' => 'Eka Saputra', 'email' => 'eka.saputra@cliforge.test'],
    ['name' => 'Fajar Nugroho', 'email' => 'fajar.nugroho@cliforge.test'],
    ['name' => 'Gilang Ramadhan', 'email' => 'gilang.ramadhan@cliforge.test'],
    ['name' => 'Hana Putri', 'email' => 'hana.putri@cliforge.test'],
    ['name' => 'Intan Permata', 'email' => 'intan.permata@cliforge.test'],
    ['name' => 'Joko Prasetyo', 'email' => 'joko.prasetyo@cliforge.test'],
];

foreach ($students as $student) {
    User::updateOrCreate(
        ['email' => $student['email']],
        [
            'name' => $student['name'],
            'password' => Hash::make('password123'),
            'role' => 'student',
        ]
    );
}

$lab = Lab::first();

if (! $lab) {
    echo "Tidak ada lab. Buat lab dulu.\n";
    exit;
}

$rules = [
    ['rule_name' => 'Bind9 Service', 'type' => 'service', 'expected' => 'active', 'weight' => 25],
    ['rule_name' => 'named.conf.local', 'type' => 'file', 'expected' => 'FOUND', 'weight' => 20],
    ['rule_name' => 'Forward Zone File', 'type' => 'file', 'expected' => 'FOUND', 'weight' => 20],
    ['rule_name' => 'DNS Port', 'type' => 'port', 'expected' => 'OPEN', 'weight' => 15],
    ['rule_name' => 'DNS Resolution', 'type' => 'command', 'expected' => '192.168.10.2', 'weight' => 20],
];

$users = User::where('role', 'student')->get();

LabResultDetail::query()->delete();
ValidatorCalibration::query()->delete();
LabResult::whereIn('user_id', $users->pluck('id'))->delete();

foreach ($users as $index => $user) {
    for ($attempt = 1; $attempt <= 3; $attempt++) {
        $scoreOptions = [60, 70, 75, 80, 85, 90, 95, 100];
        $score = $scoreOptions[($index + $attempt) % count($scoreOptions)];

        $result = LabResult::create([
            'user_id' => $user->id,
            'lab_id' => $lab->id,
            'score' => $score,
            'status' => $score >= 75 ? 'passed' : 'failed',
            'duration' => rand(70, 240),
            'submitted_at' => now()->subDays(rand(0, 6))->subMinutes(rand(5, 300)),
        ]);

        foreach ($rules as $ruleIndex => $rule) {
            $pass = true;

            if ($score < 75 && in_array($ruleIndex, [2, 4])) {
                $pass = false;
            }

            if ($score < 90 && $ruleIndex === 4 && $attempt === 1) {
                $pass = false;
            }

            $agentDecision = $pass ? 'PASS' : 'FAIL';

            $actual = match ($rule['rule_name']) {
                'Bind9 Service' => $pass ? 'active' : 'inactive',
                'named.conf.local' => $pass ? 'FOUND' : 'NOT FOUND',
                'Forward Zone File' => $pass ? 'FOUND' : 'NOT FOUND',
                'DNS Port' => $pass ? 'OPEN' : 'CLOSED',
                'DNS Resolution' => $pass ? '192.168.10.2' : '-',
                default => '-',
            };

            LabResultDetail::create([
                'lab_result_id' => $result->id,
                'rule_name' => $rule['rule_name'],
                'type' => $rule['type'],
                'status' => $agentDecision,
                'expected' => $rule['expected'],
                'actual' => $actual,
                'weight' => $rule['weight'],
                'description' => 'Demo validation rule for '.$rule['rule_name'],
                'command' => null,
            ]);

            $teacherDecision = $agentDecision;

            if ($rule['rule_name'] === 'DNS Resolution' && $result->id % 7 === 0) {
                $teacherDecision = $agentDecision === 'PASS' ? 'FAIL' : 'PASS';
            }

            ValidatorCalibration::create([
                'lab_result_id' => $result->id,
                'rule_name' => $rule['rule_name'],
                'teacher_decision' => $teacherDecision,
                'agent_decision' => $agentDecision,
                'is_agreement' => $teacherDecision === $agentDecision,
                'note' => $teacherDecision === $agentDecision
                    ? 'Keputusan guru dan Agent sesuai.'
                    : 'Perlu peninjauan rule validator.',
            ]);
        }
    }
}

echo "SELESAI\n";
echo "Siswa: ".User::where('role', 'student')->count()."\n";
echo "Lab Result: ".LabResult::count()."\n";
echo "Detail Rule: ".LabResultDetail::count()."\n";
echo "Calibration: ".ValidatorCalibration::count()."\n";