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
        <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <p class="text-sm font-bold uppercase tracking-wider text-indigo-600 dark:text-indigo-400">Percent Agreement</p>
                <h2 class="mt-1 text-3xl font-black text-gray-900 dark:text-white">Kalibrasi Validator</h2>
                <p class="mt-2 text-sm text-gray-600 dark:text-gray-300">
                    Membandingkan keputusan guru dan CLIForge Agent sebagai bukti kelayakan rule validator.
                </p>
            </div>

            <div class="flex flex-wrap gap-2">
                <a href="<?php echo e(route('validator-calibration.report')); ?>"
                   class="rounded-xl bg-indigo-600 px-4 py-2.5 text-sm font-bold text-white hover:bg-indigo-700">
                    Generate Calibration Report
                </a>

                <a href="<?php echo e(route('analytics.index')); ?>"
                   class="rounded-xl border border-gray-300 bg-white px-4 py-2.5 text-sm font-bold text-gray-700 hover:bg-gray-50 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-200 dark:hover:bg-gray-700">
                    Kembali ke Analitik
                </a>
            </div>
        </div>
     <?php $__env->endSlot(); ?>

    <div class="py-8">
        <div class="mx-auto max-w-7xl space-y-6 px-4 sm:px-6 lg:px-8">
            <div class="grid gap-4 lg:grid-cols-[1.1fr_0.9fr]">
                <div class="rounded-3xl border border-gray-200 bg-white p-6 shadow-sm dark:border-gray-700 dark:bg-gray-800">
                    <div class="flex flex-col gap-6 md:flex-row md:items-center md:justify-between">
                        <div>
                            <p class="text-sm font-bold text-gray-600 dark:text-gray-300">Percent Agreement</p>
                            <p class="mt-4 text-6xl font-black <?php echo e($pa >= 90 ? 'text-emerald-600 dark:text-emerald-400' : 'text-rose-600 dark:text-rose-400'); ?>">
                                <?php echo e(number_format($pa, 2)); ?>%
                            </p>
                            <p class="mt-3 text-sm leading-6 text-gray-600 dark:text-gray-300">
                                Kriteria kelayakan validator ditetapkan minimal <strong>90%</strong> kesesuaian dengan penilaian guru.
                            </p>

                            <div class="mt-5">
                                <?php if($isEligible): ?>
                                    <span class="inline-flex rounded-full bg-emerald-100 px-4 py-2 text-sm font-black text-emerald-700 dark:bg-emerald-900/40 dark:text-emerald-300">
                                        ✓ Validator Layak Digunakan
                                    </span>
                                <?php else: ?>
                                    <span class="inline-flex rounded-full bg-rose-100 px-4 py-2 text-sm font-black text-rose-700 dark:bg-rose-900/40 dark:text-rose-300">
                                        ✗ Validator Perlu Kalibrasi Ulang
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="mx-auto flex h-48 w-48 items-center justify-center rounded-full"
                             style="background: conic-gradient(#10b981 <?php echo e($pa); ?>%, #fecdd3 0);">
                            <div class="flex h-36 w-36 flex-col items-center justify-center rounded-full bg-white dark:bg-gray-800">
                                <span class="text-3xl font-black text-gray-900 dark:text-white"><?php echo e(number_format($pa, 1)); ?>%</span>
                                <span class="text-xs font-bold text-gray-500 dark:text-gray-400">Agreement</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="grid gap-4 sm:grid-cols-3 lg:grid-cols-1">
                    <div class="rounded-3xl border border-gray-200 bg-white p-6 shadow-sm dark:border-gray-700 dark:bg-gray-800">
                        <p class="text-sm font-bold text-gray-600 dark:text-gray-300">Total Keputusan</p>
                        <p class="mt-3 text-4xl font-black text-gray-900 dark:text-white"><?php echo e($total); ?></p>
                    </div>
                    <div class="rounded-3xl border border-gray-200 bg-white p-6 shadow-sm dark:border-gray-700 dark:bg-gray-800">
                        <p class="text-sm font-bold text-gray-600 dark:text-gray-300">Kesepakatan</p>
                        <p class="mt-3 text-4xl font-black text-emerald-600 dark:text-emerald-400"><?php echo e($agreement); ?></p>
                    </div>
                    <div class="rounded-3xl border border-gray-200 bg-white p-6 shadow-sm dark:border-gray-700 dark:bg-gray-800">
                        <p class="text-sm font-bold text-gray-600 dark:text-gray-300">Ketidaksepakatan</p>
                        <p class="mt-3 text-4xl font-black text-rose-600 dark:text-rose-400"><?php echo e($disagreement); ?></p>
                    </div>
                </div>
            </div>

            <div class="rounded-3xl border border-indigo-200 bg-indigo-50 p-6 dark:border-indigo-900 dark:bg-indigo-900/20">
                <h3 class="text-lg font-black text-indigo-900 dark:text-indigo-200">Rumus Percent Agreement</h3>
                <div class="mt-4 rounded-2xl bg-white p-5 text-center text-gray-900 shadow-sm dark:bg-gray-800 dark:text-white">
                    <p class="text-sm font-bold text-gray-600 dark:text-gray-300">
                        PA = Jumlah Kesepakatan / (Jumlah Kesepakatan + Jumlah Ketidaksepakatan) × 100%
                    </p>
                    <p class="mt-3 text-2xl font-black">
                        PA = <?php echo e($agreement); ?> / (<?php echo e($agreement); ?> + <?php echo e($disagreement); ?>) × 100% = <?php echo e(number_format($pa, 2)); ?>%
                    </p>
                </div>
            </div>

            <div class="rounded-3xl border border-gray-200 bg-white p-6 shadow-sm dark:border-gray-700 dark:bg-gray-800">
                <h3 class="text-xl font-black text-gray-900 dark:text-white">Grafik Kesesuaian per Rule</h3>
                <p class="mt-1 text-sm text-gray-600 dark:text-gray-300">Persentase agreement pada setiap rule validator.</p>

                <div class="mt-6 space-y-4">
                    <?php $__empty_1 = true; $__currentLoopData = $byRule; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rule): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <div>
                            <div class="mb-2 flex items-center justify-between text-sm">
                                <span class="font-bold text-gray-900 dark:text-white"><?php echo e($rule['rule_name']); ?></span>
                                <span class="font-bold text-gray-600 dark:text-gray-300"><?php echo e(number_format($rule['percent'], 1)); ?>%</span>
                            </div>
                            <div class="h-3 overflow-hidden rounded-full bg-gray-200 dark:bg-gray-700">
                                <div class="h-full rounded-full bg-emerald-500" style="width: <?php echo e($rule['percent']); ?>%"></div>
                            </div>
                            <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">
                                Agreement: <?php echo e($rule['agreement']); ?> · Disagreement: <?php echo e($rule['disagreement']); ?>

                            </p>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <p class="text-sm text-gray-600 dark:text-gray-300">Belum ada data grafik.</p>
                    <?php endif; ?>
                </div>
            </div>

            <div class="overflow-hidden rounded-3xl border border-gray-200 bg-white shadow-sm dark:border-gray-700 dark:bg-gray-800">
                <div class="border-b border-gray-200 px-6 py-5 dark:border-gray-700">
                    <h3 class="text-xl font-black text-gray-900 dark:text-white">Detail Kalibrasi Rule Validator</h3>
                    <p class="mt-1 text-sm text-gray-600 dark:text-gray-300">
                        Setiap baris menunjukkan satu keputusan rule antara guru dan CLIForge Agent.
                    </p>
                </div>

                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                        <thead class="bg-gray-50 dark:bg-gray-900/40">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-bold uppercase tracking-wider text-gray-600 dark:text-gray-300">Siswa</th>
                                <th class="px-6 py-3 text-left text-xs font-bold uppercase tracking-wider text-gray-600 dark:text-gray-300">Lab</th>
                                <th class="px-6 py-3 text-left text-xs font-bold uppercase tracking-wider text-gray-600 dark:text-gray-300">Rule</th>
                                <th class="px-6 py-3 text-left text-xs font-bold uppercase tracking-wider text-gray-600 dark:text-gray-300">Guru</th>
                                <th class="px-6 py-3 text-left text-xs font-bold uppercase tracking-wider text-gray-600 dark:text-gray-300">Agent</th>
                                <th class="px-6 py-3 text-center text-xs font-bold uppercase tracking-wider text-gray-600 dark:text-gray-300">Agreement</th>
                                <th class="px-6 py-3 text-left text-xs font-bold uppercase tracking-wider text-gray-600 dark:text-gray-300">Catatan</th>
                            </tr>
                        </thead>

                        <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                            <?php $__empty_1 = true; $__currentLoopData = $rows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr class="hover:bg-gray-50 dark:hover:bg-gray-700/40">
                                    <td class="px-6 py-5">
                                        <div class="font-bold text-gray-900 dark:text-white"><?php echo e($row->labResult?->user?->name ?? '-'); ?></div>
                                        <div class="text-xs text-gray-500 dark:text-gray-400"><?php echo e($row->labResult?->user?->email ?? '-'); ?></div>
                                    </td>
                                    <td class="px-6 py-5 text-sm font-semibold text-gray-700 dark:text-gray-300">
                                        <?php echo e($row->labResult?->lab?->title ?? '-'); ?>

                                        <div class="text-xs text-gray-500 dark:text-gray-400">Result #<?php echo e($row->lab_result_id); ?></div>
                                    </td>
                                    <td class="px-6 py-5 font-bold text-gray-900 dark:text-white"><?php echo e($row->rule_name); ?></td>
                                    <td class="px-6 py-5">
                                        <span class="rounded-full px-3 py-1 text-xs font-bold <?php echo e(strtoupper($row->teacher_decision) === 'PASS' ? 'bg-emerald-100 text-emerald-700 dark:bg-emerald-900/40 dark:text-emerald-300' : 'bg-rose-100 text-rose-700 dark:bg-rose-900/40 dark:text-rose-300'); ?>">
                                            <?php echo e(strtoupper($row->teacher_decision)); ?>

                                        </span>
                                    </td>
                                    <td class="px-6 py-5">
                                        <span class="rounded-full px-3 py-1 text-xs font-bold <?php echo e(strtoupper($row->agent_decision) === 'PASS' ? 'bg-emerald-100 text-emerald-700 dark:bg-emerald-900/40 dark:text-emerald-300' : 'bg-rose-100 text-rose-700 dark:bg-rose-900/40 dark:text-rose-300'); ?>">
                                            <?php echo e(strtoupper($row->agent_decision)); ?>

                                        </span>
                                    </td>
                                    <td class="px-6 py-5 text-center">
                                        <?php if($row->is_agreement): ?>
                                            <span class="inline-flex h-9 w-9 items-center justify-center rounded-full bg-emerald-100 text-lg font-black text-emerald-700 dark:bg-emerald-900/40 dark:text-emerald-300">✓</span>
                                        <?php else: ?>
                                            <span class="inline-flex h-9 w-9 items-center justify-center rounded-full bg-rose-100 text-lg font-black text-rose-700 dark:bg-rose-900/40 dark:text-rose-300">✕</span>
                                        <?php endif; ?>
                                    </td>
                                    <td class="px-6 py-5 text-sm text-gray-600 dark:text-gray-300"><?php echo e($row->note ?: '-'); ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr>
                                    <td colspan="7" class="px-6 py-14 text-center text-sm text-gray-600 dark:text-gray-300">Belum ada data kalibrasi validator.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>

                <div class="border-t border-gray-200 px-6 py-4 dark:border-gray-700"><?php echo e($rows->links()); ?></div>
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
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\cliforge\resources\views/validator-calibration/index.blade.php ENDPATH**/ ?>