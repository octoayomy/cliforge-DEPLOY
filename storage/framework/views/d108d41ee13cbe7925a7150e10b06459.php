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
                <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
                    Detail Lab Result
                </h2>
                <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                    Submission #<?php echo e($labResult->id); ?> · <?php echo e($labResult->lab?->title ?? 'Lab tidak ditemukan'); ?>

                </p>
            </div>

            <div class="flex gap-2">
    <a href="<?php echo e(route('evidence.show', $labResult)); ?>"
       class="inline-flex rounded-lg bg-indigo-600 px-4 py-2 text-sm font-semibold text-white hover:bg-indigo-700">
        View Evidence
    </a>

    <a href="<?php echo e(route('assessment.index')); ?>"
       class="inline-flex rounded-lg border border-gray-300 bg-white px-4 py-2 text-sm font-semibold text-gray-700 hover:bg-gray-50 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-200 dark:hover:bg-gray-700">
        Kembali ke Assessment
    </a>
</div>
        </div>
     <?php $__env->endSlot(); ?>

    <div class="py-8">
        <div class="mx-auto max-w-6xl space-y-6 px-4 sm:px-6 lg:px-8">
            <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
                <div class="rounded-2xl bg-white p-5 shadow-sm dark:bg-gray-800">
                    <p class="text-sm font-medium text-gray-500">Nilai</p>
                    <p class="mt-2 text-4xl font-black text-indigo-600 dark:text-indigo-400"><?php echo e($labResult->score); ?></p>
                </div>

                <div class="rounded-2xl bg-white p-5 shadow-sm dark:bg-gray-800">
                    <p class="text-sm font-medium text-gray-500">Status</p>
                    <span class="mt-3 inline-flex rounded-full px-4 py-2 text-sm font-bold
                        <?php echo e($labResult->is_passed
                            ? 'bg-emerald-100 text-emerald-700 dark:bg-emerald-900/40 dark:text-emerald-300'
                            : ($labResult->status_label === 'PENDING'
                                ? 'bg-amber-100 text-amber-700 dark:bg-amber-900/40 dark:text-amber-300'
                                : 'bg-rose-100 text-rose-700 dark:bg-rose-900/40 dark:text-rose-300')); ?>">
                        <?php echo e($labResult->status_label); ?>

                    </span>
                </div>

                <div class="rounded-2xl bg-white p-5 shadow-sm dark:bg-gray-800">
                    <p class="text-sm font-medium text-gray-500">Durasi</p>
                    <p class="mt-2 text-2xl font-bold text-gray-900 dark:text-white">
                        <?php echo e($labResult->duration !== null ? $labResult->duration.' detik' : '-'); ?>

                    </p>
                </div>

                <div class="rounded-2xl bg-white p-5 shadow-sm dark:bg-gray-800">
                    <p class="text-sm font-medium text-gray-500">Submitted</p>
                    <p class="mt-2 text-base font-bold text-gray-900 dark:text-white">
                        <?php echo e(($labResult->submitted_at ?? $labResult->created_at)?->format('d M Y') ?? '-'); ?>

                    </p>
                    <p class="text-sm text-gray-500">
                        <?php echo e(($labResult->submitted_at ?? $labResult->created_at)?->format('H:i') ?? '-'); ?>

                    </p>
                </div>
            </div>

            <div class="grid gap-6 lg:grid-cols-3">
                <div class="rounded-2xl bg-white p-6 shadow-sm dark:bg-gray-800 lg:col-span-1">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Informasi Submission</h3>

                    <dl class="mt-5 space-y-4">
                        <div>
                            <dt class="text-xs font-semibold uppercase tracking-wide text-gray-500">Siswa</dt>
                            <dd class="mt-1 font-medium text-gray-900 dark:text-white"><?php echo e($labResult->user?->name ?? '-'); ?></dd>
                            <dd class="text-sm text-gray-500"><?php echo e($labResult->user?->email); ?></dd>
                        </div>

                        <div>
                            <dt class="text-xs font-semibold uppercase tracking-wide text-gray-500">Course</dt>
                            <dd class="mt-1 font-medium text-gray-900 dark:text-white"><?php echo e($labResult->lab?->course?->title ?? '-'); ?></dd>
                        </div>

                        <div>
                            <dt class="text-xs font-semibold uppercase tracking-wide text-gray-500">Lab</dt>
                            <dd class="mt-1 font-medium text-gray-900 dark:text-white"><?php echo e($labResult->lab?->title ?? '-'); ?></dd>
                        </div>

                        <div>
                            <dt class="text-xs font-semibold uppercase tracking-wide text-gray-500">Status Database</dt>
                            <dd class="mt-1 font-medium text-gray-900 dark:text-white"><?php echo e($labResult->status ?: '-'); ?></dd>
                        </div>
                    </dl>
                </div>

                <div class="overflow-hidden rounded-2xl bg-white shadow-sm dark:bg-gray-800 lg:col-span-2">
                    <div class="border-b border-gray-200 px-6 py-5 dark:border-gray-700">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">State-Based Validation Result</h3>
                        <p class="text-sm text-gray-500 dark:text-gray-400">Rincian PASS/FAIL setiap rule validator.</p>
                    </div>

                    <?php if(is_array($labResult->details) && count($labResult->details) > 0): ?>
                        <div class="divide-y divide-gray-200 dark:divide-gray-700">
                            <?php $__currentLoopData = $labResult->details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                    $detailStatus = strtoupper((string) ($detail['status'] ?? 'UNKNOWN'));
                                    $isPass = $detailStatus === 'PASS';
                                ?>

                                <div class="p-6">
                                    <div class="flex flex-col gap-3 sm:flex-row sm:items-start sm:justify-between">
                                        <div>
                                            <h4 class="font-semibold text-gray-900 dark:text-white">
                                                <?php echo e($detail['name'] ?? $detail['description'] ?? 'Validation Rule'); ?>

                                            </h4>
                                            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                                                <?php echo e($detail['description'] ?? '-'); ?>

                                            </p>
                                        </div>

                                        <span class="inline-flex w-fit rounded-full px-3 py-1 text-xs font-bold
                                            <?php echo e($isPass
                                                ? 'bg-emerald-100 text-emerald-700 dark:bg-emerald-900/40 dark:text-emerald-300'
                                                : 'bg-rose-100 text-rose-700 dark:bg-rose-900/40 dark:text-rose-300'); ?>">
                                            <?php echo e($detailStatus); ?>

                                        </span>
                                    </div>

                                    <div class="mt-4 grid gap-3 text-sm sm:grid-cols-3">
                                        <div class="rounded-lg bg-gray-50 p-3 dark:bg-gray-900/50">
                                            <p class="text-xs font-semibold uppercase text-gray-500">Type</p>
                                            <p class="mt-1 break-words text-gray-900 dark:text-gray-200"><?php echo e($detail['type'] ?? '-'); ?></p>
                                        </div>
                                        <div class="rounded-lg bg-gray-50 p-3 dark:bg-gray-900/50">
                                            <p class="text-xs font-semibold uppercase text-gray-500">Expected</p>
                                            <p class="mt-1 break-words text-gray-900 dark:text-gray-200"><?php echo e($detail['expected'] ?? '-'); ?></p>
                                        </div>
                                        <div class="rounded-lg bg-gray-50 p-3 dark:bg-gray-900/50">
                                            <p class="text-xs font-semibold uppercase text-gray-500">Actual</p>
                                            <p class="mt-1 break-words text-gray-900 dark:text-gray-200"><?php echo e($detail['actual'] ?? '-'); ?></p>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    <?php else: ?>
                        <div class="px-6 py-14 text-center">
                            <div class="mx-auto flex h-12 w-12 items-center justify-center rounded-full bg-gray-100 text-xl dark:bg-gray-700">
                                ✓
                            </div>
                            <h4 class="mt-4 font-semibold text-gray-900 dark:text-white">Ringkasan hasil sudah tersedia</h4>
                            <p class="mx-auto mt-2 max-w-lg text-sm leading-6 text-gray-500 dark:text-gray-400">
                                Data submission ini belum memiliki JSON detail per rule. Setelah payload validator menyimpan field
                                <code class="rounded bg-gray-100 px-1.5 py-0.5 text-xs dark:bg-gray-700">details</code>,
                                rincian PASS/FAIL akan otomatis tampil di halaman ini.
                            </p>
                        </div>
                    <?php endif; ?>
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
<?php /**PATH C:\xampp\htdocs\cliforge\resources\views/assessment/show.blade.php ENDPATH**/ ?>