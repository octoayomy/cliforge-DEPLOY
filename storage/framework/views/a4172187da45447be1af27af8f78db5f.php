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
                Dashboard Siswa
            </h2>
            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                Selamat datang, <?php echo e(auth()->user()->name); ?>. Lanjutkan praktikum dan pantau hasil assessment Anda.
            </p>
        </div>
     <?php $__env->endSlot(); ?>

    <div class="py-8">
        <div class="mx-auto max-w-7xl space-y-6 px-4 sm:px-6 lg:px-8">
            <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
                <div class="rounded-2xl bg-white p-5 shadow-sm dark:bg-gray-800">
                    <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Total Progress</p>
                    <p class="mt-2 text-3xl font-bold text-gray-900 dark:text-white"><?php echo e($progresses->count()); ?></p>
                </div>

                <div class="rounded-2xl bg-white p-5 shadow-sm dark:bg-gray-800">
                    <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Completed Lab</p>
                    <p class="mt-2 text-3xl font-bold text-emerald-600 dark:text-emerald-400"><?php echo e($completedLabs); ?></p>
                </div>

                <div class="rounded-2xl bg-white p-5 shadow-sm dark:bg-gray-800">
                    <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Total Score</p>
                    <p class="mt-2 text-3xl font-bold text-indigo-600 dark:text-indigo-400"><?php echo e($totalScore); ?></p>
                </div>

                <div class="rounded-2xl bg-white p-5 shadow-sm dark:bg-gray-800">
                    <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Rata-rata Assessment</p>
                    <p class="mt-2 text-3xl font-bold text-violet-600 dark:text-violet-400"><?php echo e(number_format($averageAssessment, 1)); ?></p>
                    <p class="mt-1 text-xs text-gray-500"><?php echo e($assessmentCount); ?> submission</p>
                </div>
            </div>

            <div class="rounded-2xl bg-white p-6 shadow-sm dark:bg-gray-800">
                <div class="flex items-center justify-between">
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Course Tersedia</h3>
                        <p class="text-sm text-gray-500 dark:text-gray-400">Pilih course untuk membuka materi dan lab praktikum.</p>
                    </div>
                    <a href="<?php echo e(route('courses')); ?>" class="text-sm font-semibold text-indigo-600 hover:text-indigo-700 dark:text-indigo-400">
                        Lihat semua
                    </a>
                </div>

                <div class="mt-5 grid gap-4 md:grid-cols-2">
                    <?php $__empty_1 = true; $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <div class="rounded-xl border border-gray-200 p-5 dark:border-gray-700">
                            <div class="flex items-start justify-between gap-4">
                                <div>
                                    <h4 class="text-lg font-bold text-gray-900 dark:text-white"><?php echo e($course->title); ?></h4>
                                    <p class="mt-2 text-sm leading-6 text-gray-600 dark:text-gray-400">
                                        <?php echo e($course->description ?: 'Pembelajaran Administrasi Sistem Jaringan.'); ?>

                                    </p>
                                </div>
                                <span class="shrink-0 rounded-full bg-indigo-100 px-3 py-1 text-xs font-semibold text-indigo-700 dark:bg-indigo-900/40 dark:text-indigo-300">
                                    <?php echo e($course->labs_count); ?> lab
                                </span>
                            </div>

                            <a href="<?php echo e(route('courses.show', $course->id)); ?>" class="mt-5 inline-flex rounded-lg bg-indigo-600 px-4 py-2 text-sm font-semibold text-white hover:bg-indigo-700">
                                Buka Course
                            </a>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <div class="col-span-full rounded-xl border border-dashed border-gray-300 p-8 text-center text-sm text-gray-500 dark:border-gray-700">
                            Belum ada course.
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <div class="overflow-hidden rounded-2xl bg-white shadow-sm dark:bg-gray-800">
                <div class="flex items-center justify-between border-b border-gray-200 px-6 py-5 dark:border-gray-700">
                    <div>
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Hasil Assessment Saya</h3>
                        <p class="text-sm text-gray-500 dark:text-gray-400">Nilai terbaru dari automated assessment.</p>
                    </div>
                    <a href="<?php echo e(route('assessment.index')); ?>" class="text-sm font-semibold text-indigo-600 hover:text-indigo-700 dark:text-indigo-400">
                        Lihat semua
                    </a>
                </div>

                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                        <thead class="bg-gray-50 dark:bg-gray-900/40">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">Lab</th>
                                <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">Nilai</th>
                                <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">Status</th>
                                <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">Submitted</th>
                                <th class="px-6 py-3 text-right text-xs font-semibold uppercase tracking-wider text-gray-500">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                            <?php $__empty_1 = true; $__currentLoopData = $assessmentResults; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $result): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr>
                                    <td class="px-6 py-4">
                                        <div class="font-medium text-gray-900 dark:text-white"><?php echo e($result->lab?->title ?? '-'); ?></div>
                                        <div class="text-xs text-gray-500"><?php echo e($result->lab?->course?->title); ?></div>
                                    </td>
                                    <td class="px-6 py-4 text-lg font-bold text-gray-900 dark:text-white"><?php echo e($result->score); ?></td>
                                    <td class="px-6 py-4">
                                        <span class="inline-flex rounded-full px-3 py-1 text-xs font-bold
                                            <?php echo e($result->is_passed
                                                ? 'bg-emerald-100 text-emerald-700 dark:bg-emerald-900/40 dark:text-emerald-300'
                                                : ($result->status_label === 'PENDING'
                                                    ? 'bg-amber-100 text-amber-700 dark:bg-amber-900/40 dark:text-amber-300'
                                                    : 'bg-rose-100 text-rose-700 dark:bg-rose-900/40 dark:text-rose-300')); ?>">
                                            <?php echo e($result->status_label); ?>

                                        </span>
                                    </td>
                                    <td class="whitespace-nowrap px-6 py-4 text-sm text-gray-500">
                                        <?php echo e(($result->submitted_at ?? $result->created_at)?->format('d M Y H:i') ?? '-'); ?>

                                    </td>
                                    <td class="px-6 py-4 text-right">
                                        <a href="<?php echo e(route('assessment.show', $result)); ?>" class="text-sm font-semibold text-indigo-600 hover:text-indigo-700 dark:text-indigo-400">
                                            Detail
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr>
                                    <td colspan="5" class="px-6 py-12 text-center text-sm text-gray-500">
                                        Belum ada hasil assessment.
                                    </td>
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
<?php endif; ?>
<?php /**PATH C:\xampp\htdocs\cliforge\resources\views/student/dashboard.blade.php ENDPATH**/ ?>