<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54 = $attributes; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\AppLayout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('header', null, []); ?> 
        <div>
            <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
                Learning Analytics
            </h2>
            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                Analisis performa automated assessment, validasi rule, dan aktivitas praktikum CLIForge.
            </p>
        </div>
     <?php $__env->endSlot(); ?>

    <div class="py-8">
        <div class="mx-auto max-w-7xl space-y-6 px-4 sm:px-6 lg:px-8">
            <div class="grid gap-4 sm:grid-cols-2 xl:grid-cols-6">
                <div class="rounded-2xl bg-white p-5 shadow-sm dark:bg-gray-800">
                    <p class="text-sm font-medium text-gray-500">Total Attempts</p>
                    <p class="mt-2 text-3xl font-bold text-gray-900 dark:text-white"><?php echo e($totalAttempts); ?></p>
                </div>

                <div class="rounded-2xl bg-white p-5 shadow-sm dark:bg-gray-800">
                    <p class="text-sm font-medium text-gray-500">Today</p>
                    <p class="mt-2 text-3xl font-bold text-gray-900 dark:text-white"><?php echo e($assessmentToday); ?></p>
                </div>

                <div class="rounded-2xl bg-white p-5 shadow-sm dark:bg-gray-800">
                    <p class="text-sm font-medium text-gray-500">Active Students</p>
                    <p class="mt-2 text-3xl font-bold text-gray-900 dark:text-white"><?php echo e($activeStudents); ?></p>
                </div>

                <div class="rounded-2xl bg-white p-5 shadow-sm dark:bg-gray-800">
                    <p class="text-sm font-medium text-gray-500">Average Score</p>
                    <p class="mt-2 text-3xl font-bold text-indigo-600 dark:text-indigo-400"><?php echo e(number_format($averageScore, 1)); ?></p>
                </div>

                <div class="rounded-2xl bg-white p-5 shadow-sm dark:bg-gray-800">
                    <p class="text-sm font-medium text-gray-500">Pass Rate</p>
                    <p class="mt-2 text-3xl font-bold text-emerald-600 dark:text-emerald-400"><?php echo e(number_format($passRate, 1)); ?>%</p>
                    <p class="mt-1 text-xs text-gray-500"><?php echo e($passedAttempts); ?> submission lulus</p>
                </div>

                <div class="rounded-2xl bg-white p-5 shadow-sm dark:bg-gray-800">
                    <p class="text-sm font-medium text-gray-500">Avg Duration</p>
                    <p class="mt-2 text-3xl font-bold text-violet-600 dark:text-violet-400"><?php echo e(number_format($averageDuration, 1)); ?></p>
                    <p class="mt-1 text-xs text-gray-500">detik/submission</p>
                </div>
            </div>

            <div class="grid gap-6 xl:grid-cols-2">
                <div class="rounded-2xl bg-white p-6 shadow-sm dark:bg-gray-800">
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Aktivitas 7 Hari Terakhir</h3>
                        <p class="text-sm text-gray-500 dark:text-gray-400">Jumlah submission per hari.</p>
                    </div>

                    <div class="mt-6 space-y-4">
                        <?php $__currentLoopData = $timeline; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $day): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="grid items-center gap-3 sm:grid-cols-[120px_1fr_80px]">
                                <div class="text-sm font-medium text-gray-600 dark:text-gray-300"><?php echo e($day['label']); ?></div>
                                <div class="h-3 overflow-hidden rounded-full bg-gray-100 dark:bg-gray-700">
                                    <div class="h-full rounded-full bg-indigo-600" style="width: <?php echo e($day['percentage']); ?>%"></div>
                                </div>
                                <div class="text-right text-sm font-semibold text-gray-900 dark:text-white">
                                    <?php echo e($day['attempts']); ?> attempt
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>

                <div class="overflow-hidden rounded-2xl bg-white shadow-sm dark:bg-gray-800">
                    <div class="border-b border-gray-200 px-6 py-5 dark:border-gray-700">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Most Failed Validation</h3>
                        <p class="text-sm text-gray-500">Rule state-based validation yang paling sering gagal.</p>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                            <thead class="bg-gray-50 dark:bg-gray-900/40">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-semibold uppercase text-gray-500">Rule</th>
                                    <th class="px-6 py-3 text-center text-xs font-semibold uppercase text-gray-500">Type</th>
                                    <th class="px-6 py-3 text-center text-xs font-semibold uppercase text-gray-500">Failed</th>
                                    <th class="px-6 py-3 text-left text-xs font-semibold uppercase text-gray-500">Latest Actual</th>
                                </tr>
                            </thead>

                            <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                                <?php $__empty_1 = true; $__currentLoopData = $failedValidationRules; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rule): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr>
                                        <td class="px-6 py-4">
                                            <div class="font-medium text-gray-900 dark:text-white"><?php echo e($rule['name']); ?></div>
                                            <div class="mt-1 text-xs text-gray-500">Expected: <?php echo e($rule['latest_expected']); ?></div>
                                        </td>
                                        <td class="px-6 py-4 text-center">
                                            <span class="rounded-full bg-indigo-100 px-3 py-1 text-xs font-bold text-indigo-700 dark:bg-indigo-900/40 dark:text-indigo-300">
                                                <?php echo e(strtoupper($rule['type'])); ?>

                                            </span>
                                        </td>
                                        <td class="px-6 py-4 text-center">
                                            <span class="rounded-full bg-rose-100 px-3 py-1 text-xs font-bold text-rose-700 dark:bg-rose-900/40 dark:text-rose-300">
                                                <?php echo e($rule['failed']); ?>

                                            </span>
                                        </td>
                                        <td class="px-6 py-4">
                                            <code class="break-all text-xs text-gray-600 dark:text-gray-300">
                                                <?php echo e($rule['latest_actual']); ?>

                                            </code>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <tr>
                                        <td colspan="4" class="px-6 py-10 text-center text-sm text-gray-500">
                                            Belum ada rule validasi yang gagal.
                                        </td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="grid gap-6 xl:grid-cols-2">
                <div class="overflow-hidden rounded-2xl bg-white shadow-sm dark:bg-gray-800">
                    <div class="border-b border-gray-200 px-6 py-5 dark:border-gray-700">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Recent Assessment Activity</h3>
                        <p class="text-sm text-gray-500">Submission terbaru dari CLIForge Agent.</p>
                    </div>

                    <div class="divide-y divide-gray-200 dark:divide-gray-700">
                        <?php $__empty_1 = true; $__currentLoopData = $recentResults; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $result): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <div class="flex items-center justify-between gap-4 px-6 py-4">
                                <div>
                                    <div class="font-medium text-gray-900 dark:text-white">
                                        <?php echo e($result->user?->name ?? '-'); ?>

                                    </div>
                                    <div class="text-sm text-gray-500">
                                        <?php echo e($result->lab?->title ?? '-'); ?> ·
                                        <?php echo e(($result->submitted_at ?? $result->created_at)?->format('d M Y H:i')); ?>

                                    </div>
                                </div>

                                <div class="flex items-center gap-3">
                                    <span class="text-lg font-bold text-indigo-600 dark:text-indigo-400">
                                        <?php echo e($result->score); ?>

                                    </span>

                                    <span class="rounded-full px-3 py-1 text-xs font-bold
                                        <?php echo e($result->is_passed
                                            ? 'bg-emerald-100 text-emerald-700 dark:bg-emerald-900/40 dark:text-emerald-300'
                                            : 'bg-rose-100 text-rose-700 dark:bg-rose-900/40 dark:text-rose-300'); ?>">
                                        <?php echo e($result->status_label); ?>

                                    </span>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <div class="px-6 py-10 text-center text-sm text-gray-500">
                                Belum ada aktivitas assessment.
                            </div>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="overflow-hidden rounded-2xl bg-white shadow-sm dark:bg-gray-800">
                    <div class="border-b border-gray-200 px-6 py-5 dark:border-gray-700">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Lab Performance</h3>
                        <p class="text-sm text-gray-500">Perbandingan attempt, nilai, durasi, dan pass rate.</p>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                            <thead class="bg-gray-50 dark:bg-gray-900/40">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-semibold uppercase text-gray-500">Lab</th>
                                    <th class="px-6 py-3 text-center text-xs font-semibold uppercase text-gray-500">Attempt</th>
                                    <th class="px-6 py-3 text-center text-xs font-semibold uppercase text-gray-500">Average</th>
                                    <th class="px-6 py-3 text-center text-xs font-semibold uppercase text-gray-500">Duration</th>
                                    <th class="px-6 py-3 text-right text-xs font-semibold uppercase text-gray-500">Pass Rate</th>
                                </tr>
                            </thead>

                            <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                                <?php $__empty_1 = true; $__currentLoopData = $labPerformance; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lab): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr>
                                        <td class="px-6 py-4 font-medium text-gray-900 dark:text-white"><?php echo e($lab['title']); ?></td>
                                        <td class="px-6 py-4 text-center text-sm text-gray-600 dark:text-gray-300"><?php echo e($lab['attempts']); ?></td>
                                        <td class="px-6 py-4 text-center font-bold text-indigo-600 dark:text-indigo-400"><?php echo e(number_format($lab['average'], 1)); ?></td>
                                        <td class="px-6 py-4 text-center text-sm text-gray-600 dark:text-gray-300"><?php echo e(number_format($lab['average_duration'], 1)); ?>s</td>
                                        <td class="px-6 py-4 text-right font-bold text-emerald-600 dark:text-emerald-400"><?php echo e(number_format($lab['pass_rate'], 1)); ?>%</td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <tr>
                                        <td colspan="5" class="px-6 py-10 text-center text-sm text-gray-500">Belum ada data lab.</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="overflow-hidden rounded-2xl bg-white shadow-sm dark:bg-gray-800">
                <div class="border-b border-gray-200 px-6 py-5 dark:border-gray-700">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Top Student Performance</h3>
                    <p class="text-sm text-gray-500">Urutan berdasarkan rata-rata nilai dan pass rate.</p>
                </div>

                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                        <thead class="bg-gray-50 dark:bg-gray-900/40">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-semibold uppercase text-gray-500">Siswa</th>
                                <th class="px-6 py-3 text-center text-xs font-semibold uppercase text-gray-500">Attempt</th>
                                <th class="px-6 py-3 text-center text-xs font-semibold uppercase text-gray-500">Passed</th>
                                <th class="px-6 py-3 text-center text-xs font-semibold uppercase text-gray-500">Pass Rate</th>
                                <th class="px-6 py-3 text-right text-xs font-semibold uppercase text-gray-500">Average</th>
                            </tr>
                        </thead>

                        <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                            <?php $__empty_1 = true; $__currentLoopData = $studentPerformance; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr>
                                    <td class="px-6 py-4">
                                        <div class="font-medium text-gray-900 dark:text-white"><?php echo e($student['name']); ?></div>
                                        <div class="text-xs text-gray-500"><?php echo e($student['email']); ?></div>
                                    </td>
                                    <td class="px-6 py-4 text-center text-sm text-gray-600 dark:text-gray-300"><?php echo e($student['attempts']); ?></td>
                                    <td class="px-6 py-4 text-center text-sm text-gray-600 dark:text-gray-300"><?php echo e($student['passed']); ?></td>
                                    <td class="px-6 py-4 text-center font-bold text-emerald-600 dark:text-emerald-400"><?php echo e(number_format($student['pass_rate'], 1)); ?>%</td>
                                    <td class="px-6 py-4 text-right font-bold text-indigo-600 dark:text-indigo-400"><?php echo e(number_format($student['average'], 1)); ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr>
                                    <td colspan="5" class="px-6 py-10 text-center text-sm text-gray-500">Belum ada data siswa.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $attributes = $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?><?php /**PATH C:\xampp\htdocs\cliforge\resources\views/analytics/index.blade.php ENDPATH**/ ?>