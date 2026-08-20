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
        <div class="flex flex-col gap-4 lg:flex-row lg:items-center lg:justify-between">
            <div>
                <p class="text-sm font-bold uppercase tracking-wider text-indigo-600 dark:text-indigo-400">
                    CLIForge Admin
                </p>
                <h2 class="mt-1 text-3xl font-black leading-tight text-gray-900 dark:text-white">
                    Dashboard Admin
                </h2>
                <p class="mt-2 text-sm text-gray-600 dark:text-gray-300">
                    Monitoring virtual lab, automated assessment, perangkat, dan aktivitas pembelajaran siswa.
                </p>
            </div>

            <div class="flex flex-wrap gap-2">
                <a href="<?php echo e(route('assessment.index')); ?>"
                   class="rounded-xl bg-indigo-600 px-4 py-2.5 text-sm font-bold text-white hover:bg-indigo-700">
                    Buka Asesmen
                </a>

                <a href="<?php echo e(route('analytics.index')); ?>"
                   class="rounded-xl border border-gray-300 bg-white px-4 py-2.5 text-sm font-bold text-gray-700 hover:bg-gray-50 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-200 dark:hover:bg-gray-700">
                    Analitik Pembelajaran
                </a>

                <a href="http://127.0.0.1:8001"
                   target="_blank"
                   class="rounded-xl border border-gray-300 bg-white px-4 py-2.5 text-sm font-bold text-gray-700 hover:bg-gray-50 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-200 dark:hover:bg-gray-700">
                    Dokumentasi
                </a>
            </div>
        </div>
     <?php $__env->endSlot(); ?>

    <div class="py-8">
        <div class="mx-auto max-w-7xl space-y-6 px-4 sm:px-6 lg:px-8">

            <div class="grid gap-4 sm:grid-cols-2 xl:grid-cols-5">
                <div class="rounded-3xl border border-gray-200 bg-white p-5 shadow-sm dark:border-gray-700 dark:bg-gray-800">
                    <div class="flex items-center justify-between">
                        <p class="text-sm font-bold text-gray-600 dark:text-gray-300">Siswa</p>
                        <span class="rounded-2xl bg-blue-100 p-2 text-xl dark:bg-blue-900/40">👥</span>
                    </div>
                    <p class="mt-4 text-4xl font-black text-gray-900 dark:text-white"><?php echo e($totalStudents); ?></p>
                    <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">Akun siswa terdaftar</p>
                </div>

                <div class="rounded-3xl border border-gray-200 bg-white p-5 shadow-sm dark:border-gray-700 dark:bg-gray-800">
                    <div class="flex items-center justify-between">
                        <p class="text-sm font-bold text-gray-600 dark:text-gray-300">Lab</p>
                        <span class="rounded-2xl bg-purple-100 p-2 text-xl dark:bg-purple-900/40">💻</span>
                    </div>
                    <p class="mt-4 text-4xl font-black text-gray-900 dark:text-white"><?php echo e($totalLabs); ?></p>
                    <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">Virtual lab aktif</p>
                </div>

                <div class="rounded-3xl border border-gray-200 bg-white p-5 shadow-sm dark:border-gray-700 dark:bg-gray-800">
                    <div class="flex items-center justify-between">
                        <p class="text-sm font-bold text-gray-600 dark:text-gray-300">Asesmen</p>
                        <span class="rounded-2xl bg-amber-100 p-2 text-xl dark:bg-amber-900/40">🧪</span>
                    </div>
                    <p class="mt-4 text-4xl font-black text-gray-900 dark:text-white"><?php echo e($totalAssessments); ?></p>
                    <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">Submission Agent</p>
                </div>

                <div class="rounded-3xl border border-gray-200 bg-white p-5 shadow-sm dark:border-gray-700 dark:bg-gray-800">
                    <div class="flex items-center justify-between">
                        <p class="text-sm font-bold text-gray-600 dark:text-gray-300">Rata-rata</p>
                        <span class="rounded-2xl bg-indigo-100 p-2 text-xl dark:bg-indigo-900/40">📊</span>
                    </div>
                    <p class="mt-4 text-4xl font-black text-indigo-600 dark:text-indigo-400">
                        <?php echo e(number_format($averageScore, 1)); ?>

                    </p>
                    <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">Rata-rata nilai lab</p>
                </div>

                <div class="rounded-3xl border border-gray-200 bg-white p-5 shadow-sm dark:border-gray-700 dark:bg-gray-800">
                    <div class="flex items-center justify-between">
                        <p class="text-sm font-bold text-gray-600 dark:text-gray-300">Pass Rate</p>
                        <span class="rounded-2xl bg-emerald-100 p-2 text-xl dark:bg-emerald-900/40">✅</span>
                    </div>
                    <p class="mt-4 text-4xl font-black text-emerald-600 dark:text-emerald-400">
                        <?php echo e(number_format($passRate, 1)); ?>%
                    </p>
                    <p class="mt-1 text-xs text-gray-500 dark:text-gray-400"><?php echo e($passedAssessments); ?> asesmen lulus</p>
                </div>
            </div>

            <div class="grid gap-6 lg:grid-cols-4">
                <a href="<?php echo e(route('courses')); ?>"
                   class="rounded-3xl border border-gray-200 bg-white p-6 shadow-sm transition hover:-translate-y-0.5 hover:shadow-md dark:border-gray-700 dark:bg-gray-800">
                    <div class="text-3xl">📘</div>
                    <h3 class="mt-4 text-lg font-black text-gray-900 dark:text-white">Kursus</h3>
                    <p class="mt-2 text-sm leading-6 text-gray-600 dark:text-gray-300">
                        Buka course, materi, kuis, dan virtual lab siswa.
                    </p>
                </a>

                <a href="<?php echo e(route('admin.lessons.index')); ?>"
                   class="rounded-3xl border border-gray-200 bg-white p-6 shadow-sm transition hover:-translate-y-0.5 hover:shadow-md dark:border-gray-700 dark:bg-gray-800">
                    <div class="text-3xl">🛠️</div>
                    <h3 class="mt-4 text-lg font-black text-gray-900 dark:text-white">Kelola Materi</h3>
                    <p class="mt-2 text-sm leading-6 text-gray-600 dark:text-gray-300">
                        Kelola lesson theory, quiz, lab, dan checker command.
                    </p>
                </a>

                <a href="<?php echo e(route('admin.devices.index')); ?>"
                   class="rounded-3xl border border-gray-200 bg-white p-6 shadow-sm transition hover:-translate-y-0.5 hover:shadow-md dark:border-gray-700 dark:bg-gray-800">
                    <div class="text-3xl">🔐</div>
                    <h3 class="mt-4 text-lg font-black text-gray-900 dark:text-white">Manajemen Perangkat</h3>
                    <p class="mt-2 text-sm leading-6 text-gray-600 dark:text-gray-300">
                        Approve device siswa yang login dari CLIForge Agent.
                    </p>
                </a>

                <a href="<?php echo e(route('leaderboard')); ?>"
                   class="rounded-3xl border border-gray-200 bg-white p-6 shadow-sm transition hover:-translate-y-0.5 hover:shadow-md dark:border-gray-700 dark:bg-gray-800">
                    <div class="text-3xl">🏆</div>
                    <h3 class="mt-4 text-lg font-black text-gray-900 dark:text-white">Papan Peringkat</h3>
                    <p class="mt-2 text-sm leading-6 text-gray-600 dark:text-gray-300">
                        Lihat ranking siswa berdasarkan hasil assessment.
                    </p>
                </a>
            </div>

            <div class="overflow-hidden rounded-3xl border border-gray-200 bg-white shadow-sm dark:border-gray-700 dark:bg-gray-800">
                <div class="flex flex-col gap-3 border-b border-gray-200 px-6 py-5 dark:border-gray-700 sm:flex-row sm:items-center sm:justify-between">
                    <div>
                        <h3 class="text-xl font-black text-gray-900 dark:text-white">
                            Hasil Asesmen Terbaru
                        </h3>
                        <p class="mt-1 text-sm text-gray-600 dark:text-gray-300">
                            Submission terbaru dari CLIForge Agent.
                        </p>
                    </div>

                    <a href="<?php echo e(route('assessment.index')); ?>"
                       class="text-sm font-bold text-indigo-600 hover:text-indigo-700 dark:text-indigo-400">
                        Lihat semua →
                    </a>
                </div>

                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                        <thead class="bg-gray-50 dark:bg-gray-900/40">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-bold uppercase tracking-wider text-gray-600 dark:text-gray-300">Siswa</th>
                                <th class="px-6 py-3 text-left text-xs font-bold uppercase tracking-wider text-gray-600 dark:text-gray-300">Lab</th>
                                <th class="px-6 py-3 text-left text-xs font-bold uppercase tracking-wider text-gray-600 dark:text-gray-300">Nilai</th>
                                <th class="px-6 py-3 text-left text-xs font-bold uppercase tracking-wider text-gray-600 dark:text-gray-300">Status</th>
                                <th class="px-6 py-3 text-left text-xs font-bold uppercase tracking-wider text-gray-600 dark:text-gray-300">Waktu</th>
                                <th class="px-6 py-3 text-right text-xs font-bold uppercase tracking-wider text-gray-600 dark:text-gray-300">Aksi</th>
                            </tr>
                        </thead>

                        <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                            <?php $__empty_1 = true; $__currentLoopData = $recentResults; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $result): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr class="hover:bg-gray-50 dark:hover:bg-gray-700/40">
                                    <td class="whitespace-nowrap px-6 py-4">
                                        <div class="font-bold text-gray-900 dark:text-white">
                                            <?php echo e($result->user?->name ?? '-'); ?>

                                        </div>
                                        <div class="text-xs text-gray-500 dark:text-gray-400">
                                            <?php echo e($result->user?->email); ?>

                                        </div>
                                    </td>

                                    <td class="px-6 py-4 text-sm font-semibold text-gray-700 dark:text-gray-300">
                                        <?php echo e($result->lab?->title ?? '-'); ?>

                                    </td>

                                    <td class="px-6 py-4">
                                        <span class="text-xl font-black text-gray-900 dark:text-white">
                                            <?php echo e($result->score); ?>

                                        </span>
                                    </td>

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

                                    <td class="whitespace-nowrap px-6 py-4 text-sm text-gray-600 dark:text-gray-300">
                                        <?php echo e(($result->submitted_at ?? $result->created_at)?->format('d M Y H:i') ?? '-'); ?>

                                    </td>

                                    <td class="whitespace-nowrap px-6 py-4 text-right">
                                        <a href="<?php echo e(route('assessment.show', $result)); ?>"
                                           class="rounded-xl bg-indigo-50 px-3 py-2 text-sm font-bold text-indigo-700 hover:bg-indigo-100 dark:bg-indigo-900/30 dark:text-indigo-300 dark:hover:bg-indigo-900/50">
                                            Detail
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr>
                                    <td colspan="6" class="px-6 py-12 text-center text-sm text-gray-600 dark:text-gray-300">
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
<?php endif; ?><?php /**PATH C:\xampp\htdocs\cliforge\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>