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
        <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between print:hidden">
            <div>
                <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
                    Assessment Evidence Report
                </h2>
                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                    Bukti digital hasil state-based validation CLIForge.
                </p>
            </div>

            <div class="flex flex-wrap gap-2">
                <a href="<?php echo e(route('assessment.show', $labResult)); ?>"
                   class="rounded-lg border border-gray-300 px-4 py-2 text-sm font-semibold text-gray-700 hover:bg-gray-50 dark:border-gray-600 dark:text-gray-200 dark:hover:bg-gray-700">
                    Kembali
                </a>

                <?php if(auth()->user()->isAdmin()): ?>
    <button onclick="window.print()"
            class="rounded-lg bg-indigo-600 px-4 py-2 text-sm font-semibold text-white hover:bg-indigo-700">
        Print / Save PDF
    </button>
<?php endif; ?>
            </div>
        </div>
     <?php $__env->endSlot(); ?>

    <style>
        @media print {
            body { background: #ffffff !important; }
            nav, header, .print\:hidden { display: none !important; }
            .print-page { box-shadow: none !important; border: none !important; margin: 0 !important; border-radius: 0 !important; }
            .print-break { page-break-inside: avoid; }
        }
    </style>

    <div class="py-8 print:py-0">
        <div class="mx-auto max-w-5xl px-4 sm:px-6 lg:px-8 print:max-w-none print:px-0">
            <div class="print-page overflow-hidden rounded-2xl bg-white shadow-sm dark:bg-gray-800 print:bg-white">

                <div class="border-b border-gray-200 px-8 py-7 dark:border-gray-700 print:border-gray-300">
                    <div class="flex flex-col gap-5 sm:flex-row sm:items-start sm:justify-between">
                        <div>
                            <div class="flex items-center gap-3">
                                <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-indigo-600 text-xl font-black text-white">
                                    C
                                </div>

                                <div>
                                    <div class="text-sm font-bold uppercase tracking-wider text-indigo-600">
                                        CLIForge
                                    </div>
                                    <h1 class="text-2xl font-black text-gray-900 dark:text-white print:text-black">
                                        Assessment Evidence Report
                                    </h1>
                                </div>
                            </div>

                            <div class="mt-5">
                                <p class="text-base font-bold text-gray-900 dark:text-white print:text-black">
                                    SMK Negeri 1 Nganjuk
                                </p>
                                <p class="mt-1 max-w-2xl text-sm leading-6 text-gray-600 dark:text-gray-400 print:text-gray-700">
                                    Laporan ini merupakan data pendukung hasil automated assessment dan digunakan sebagai triangulasi terhadap rubrik penilaian keterampilan praktik.
                                </p>
                            </div>
                        </div>

                        <div class="rounded-2xl border border-gray-200 bg-gray-50 px-7 py-5 text-center dark:border-gray-700 dark:bg-gray-900/50 print:border-gray-300 print:bg-white">
                            <p class="text-sm font-medium text-gray-500 print:text-gray-600">Final Score</p>
                            <p class="mt-1 text-5xl font-black text-indigo-600">
                                <?php echo e($labResult->score); ?>

                            </p>
                            <p class="mt-1 text-xs font-semibold uppercase text-gray-500 print:text-gray-600">
                                <?php echo e($labResult->status_label); ?>

                            </p>
                        </div>
                    </div>
                </div>

                <div class="grid gap-4 px-8 py-6 md:grid-cols-2">
                    <div class="rounded-xl border border-gray-200 bg-gray-50 p-4 dark:border-gray-700 dark:bg-gray-900/50 print:border-gray-300 print:bg-white">
                        <p class="text-xs font-semibold uppercase tracking-wide text-gray-500">Student</p>
                        <p class="mt-1 font-bold text-gray-900 dark:text-white print:text-black">
                            <?php echo e($labResult->user?->name ?? '-'); ?>

                        </p>
                        <p class="text-xs text-gray-500 print:text-gray-600">
                            <?php echo e($labResult->user?->email); ?>

                        </p>
                    </div>

                    <div class="rounded-xl border border-gray-200 bg-gray-50 p-4 dark:border-gray-700 dark:bg-gray-900/50 print:border-gray-300 print:bg-white">
                        <p class="text-xs font-semibold uppercase tracking-wide text-gray-500">Course / Lab</p>
                        <p class="mt-1 font-bold text-gray-900 dark:text-white print:text-black">
                            <?php echo e($labResult->lab?->course?->title ?? '-'); ?>

                        </p>
                        <p class="text-xs text-gray-500 print:text-gray-600">
                            <?php echo e($labResult->lab?->title ?? '-'); ?>

                        </p>
                    </div>

                    <div class="rounded-xl border border-gray-200 bg-gray-50 p-4 dark:border-gray-700 dark:bg-gray-900/50 print:border-gray-300 print:bg-white">
                        <p class="text-xs font-semibold uppercase tracking-wide text-gray-500">Duration</p>
                        <p class="mt-1 font-bold text-gray-900 dark:text-white print:text-black">
                            <?php echo e($labResult->duration !== null ? $labResult->duration.' detik' : '-'); ?>

                        </p>
                        <p class="text-xs text-gray-500 print:text-gray-600">
                            waktu pengerjaan praktikum
                        </p>
                    </div>

                    <div class="rounded-xl border border-gray-200 bg-gray-50 p-4 dark:border-gray-700 dark:bg-gray-900/50 print:border-gray-300 print:bg-white">
                        <p class="text-xs font-semibold uppercase tracking-wide text-gray-500">Assessment Date</p>
                        <p class="mt-1 font-bold text-gray-900 dark:text-white print:text-black">
                            <?php echo e(($labResult->submitted_at ?? $labResult->created_at)?->format('d M Y') ?? '-'); ?>

                        </p>
                        <p class="text-xs text-gray-500 print:text-gray-600">
                            <?php echo e(($labResult->submitted_at ?? $labResult->created_at)?->format('H:i') ?? '-'); ?>

                        </p>
                    </div>
                </div>

                <div class="grid gap-4 px-8 pb-6 md:grid-cols-4 print-break">
                    <div class="rounded-xl border border-emerald-200 bg-emerald-50 p-4 print:border-gray-300 print:bg-white">
                        <p class="text-xs font-semibold uppercase tracking-wide text-emerald-700 print:text-gray-600">Passed Rule</p>
                        <p class="mt-1 text-3xl font-black text-emerald-700 print:text-black"><?php echo e($passedRules); ?></p>
                    </div>

                    <div class="rounded-xl border border-rose-200 bg-rose-50 p-4 print:border-gray-300 print:bg-white">
                        <p class="text-xs font-semibold uppercase tracking-wide text-rose-700 print:text-gray-600">Failed Rule</p>
                        <p class="mt-1 text-3xl font-black text-rose-700 print:text-black"><?php echo e($failedRules); ?></p>
                    </div>

                    <div class="rounded-xl border border-indigo-200 bg-indigo-50 p-4 print:border-gray-300 print:bg-white">
                        <p class="text-xs font-semibold uppercase tracking-wide text-indigo-700 print:text-gray-600">Total Rule</p>
                        <p class="mt-1 text-3xl font-black text-indigo-700 print:text-black"><?php echo e($totalRules); ?></p>
                    </div>

                    <div class="rounded-xl border border-violet-200 bg-violet-50 p-4 print:border-gray-300 print:bg-white">
                        <p class="text-xs font-semibold uppercase tracking-wide text-violet-700 print:text-gray-600">Pass Rate</p>
                        <p class="mt-1 text-3xl font-black text-violet-700 print:text-black"><?php echo e(number_format($passRate, 1)); ?>%</p>
                    </div>
                </div>

                <div class="border-t border-gray-200 px-8 py-6 dark:border-gray-700 print:border-gray-300 print-break">
                    <h2 class="text-lg font-bold text-gray-900 dark:text-white print:text-black">Validation Detail</h2>
                    <p class="mt-1 text-sm text-gray-500 print:text-gray-600">
                        Rincian indikator praktik yang divalidasi otomatis oleh CLIForge Agent.
                    </p>

                    <div class="mt-5 overflow-hidden rounded-xl border border-gray-200 dark:border-gray-700 print:border-gray-300">
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700 print:divide-gray-300">
                            <thead class="bg-gray-50 dark:bg-gray-900/40 print:bg-gray-100">
                                <tr>
                                    <th class="px-4 py-3 text-left text-xs font-bold uppercase tracking-wide text-gray-500 print:text-gray-700">Rule</th>
                                    <th class="px-4 py-3 text-center text-xs font-bold uppercase tracking-wide text-gray-500 print:text-gray-700">Type</th>
                                    <th class="px-4 py-3 text-center text-xs font-bold uppercase tracking-wide text-gray-500 print:text-gray-700">Status</th>
                                    <th class="px-4 py-3 text-left text-xs font-bold uppercase tracking-wide text-gray-500 print:text-gray-700">Expected</th>
                                    <th class="px-4 py-3 text-left text-xs font-bold uppercase tracking-wide text-gray-500 print:text-gray-700">Actual</th>
                                    <th class="px-4 py-3 text-center text-xs font-bold uppercase tracking-wide text-gray-500 print:text-gray-700">Weight</th>
                                </tr>
                            </thead>

                            <tbody class="divide-y divide-gray-200 dark:divide-gray-700 print:divide-gray-300">
                                <?php $__empty_1 = true; $__currentLoopData = $details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr>
                                        <td class="px-4 py-3">
                                            <div class="font-semibold text-gray-900 dark:text-white print:text-black">
                                                <?php echo e($detail->rule_name); ?>

                                            </div>
                                            <div class="mt-1 text-xs text-gray-500 print:text-gray-600">
                                                <?php echo e($detail->description); ?>

                                            </div>
                                        </td>

                                        <td class="px-4 py-3 text-center text-xs font-bold text-gray-700 dark:text-gray-300 print:text-black">
                                            <?php echo e(strtoupper($detail->type)); ?>

                                        </td>

                                        <td class="px-4 py-3 text-center">
                                            <?php if(strtoupper($detail->status) === 'PASS'): ?>
                                                <span class="rounded-full bg-emerald-100 px-3 py-1 text-xs font-bold text-emerald-700 print:border print:border-gray-300 print:bg-white print:text-black">PASS</span>
                                            <?php elseif(strtoupper($detail->status) === 'FAIL'): ?>
                                                <span class="rounded-full bg-rose-100 px-3 py-1 text-xs font-bold text-rose-700 print:border print:border-gray-300 print:bg-white print:text-black">FAIL</span>
                                            <?php else: ?>
                                                <span class="rounded-full bg-gray-100 px-3 py-1 text-xs font-bold text-gray-700 print:border print:border-gray-300 print:bg-white print:text-black"><?php echo e(strtoupper($detail->status)); ?></span>
                                            <?php endif; ?>
                                        </td>

                                        <td class="px-4 py-3">
                                            <code class="break-all text-xs text-gray-700 dark:text-gray-300 print:text-black"><?php echo e($detail->expected); ?></code>
                                        </td>

                                        <td class="px-4 py-3">
                                            <code class="break-all text-xs text-gray-700 dark:text-gray-300 print:text-black"><?php echo e($detail->actual); ?></code>
                                        </td>

                                        <td class="px-4 py-3 text-center font-bold text-gray-900 dark:text-white print:text-black">
                                            <?php echo e($detail->weight); ?>

                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <tr>
                                        <td colspan="6" class="px-5 py-10 text-center text-sm text-gray-500">
                                            Belum ada evidence detail untuk assessment ini.
                                        </td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="border-t border-gray-200 px-8 py-6 dark:border-gray-700 print:border-gray-300 print-break">
                    <h2 class="text-lg font-bold text-gray-900 dark:text-white print:text-black">Recommendation</h2>
                    <p class="mt-1 text-sm text-gray-500 print:text-gray-600">
                        Rekomendasi otomatis berdasarkan rule yang belum terpenuhi.
                    </p>

                    <div class="mt-5 space-y-3">
                        <?php $__currentLoopData = $recommendations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $recommendation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="rounded-xl bg-amber-50 px-4 py-3 text-sm leading-6 text-amber-800 dark:bg-amber-900/20 dark:text-amber-200 print:border print:border-gray-300 print:bg-white print:text-black">
                                <?php echo e($recommendation); ?>

                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
                <?php if(auth()->user()->isAdmin()): ?>
                <div class="border-t border-gray-200 px-8 py-6 dark:border-gray-700 print:border-gray-300 print-break">
                    <h2 class="text-lg font-bold text-gray-900 dark:text-white print:text-black">Teacher Note</h2>
                    <p class="mt-1 text-sm text-gray-500 print:text-gray-600">
                        Catatan guru dapat ditambahkan setelah laporan dicetak.
                    </p>

                    <div class="mt-5 space-y-4">
                        <div class="h-10 border-b border-gray-300"></div>
                        <div class="h-10 border-b border-gray-300"></div>
                        <div class="h-10 border-b border-gray-300"></div>
                    </div>
                </div>

                <div class="border-t border-gray-200 px-8 py-7 dark:border-gray-700 print:border-gray-300">
                    <div class="grid gap-8 md:grid-cols-2">
                        <div>
                            <p class="text-sm font-semibold text-gray-900 dark:text-white print:text-black">Generated by CLIForge</p>
                            <p class="mt-1 text-sm leading-6 text-gray-500 print:text-gray-600">
                                Data ini merupakan bukti digital pendukung dan tidak menggantikan rubrik penilaian keterampilan praktik yang digunakan guru.
                            </p>
                        </div>

                        <div class="text-center md:text-right">
                            <p class="text-sm text-gray-600 print:text-gray-700">
                                Nganjuk, <?php echo e(now()->format('d M Y')); ?>

                            </p>
                            <div class="mt-16 border-t border-gray-300 pt-2 text-sm font-semibold text-gray-900 dark:text-white print:text-black">
                                Teacher Signature
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
                </div>

                <div class="border-t border-gray-200 bg-gray-50 px-8 py-4 text-xs text-gray-500 dark:border-gray-700 dark:bg-gray-900/40 dark:text-gray-400 print:border-gray-300 print:bg-white print:text-gray-600">
                    CLIForge Assessment Evidence Report · Generated automatically by CLIForge Agent and Laravel Assessment Engine.
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
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\cliforge\resources\views/evidence/show.blade.php ENDPATH**/ ?>