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
                Papan Peringkat
            </h2>
            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                Peringkat siswa berdasarkan rata-rata nilai, tingkat kelulusan, dan aktivitas asesmen otomatis.
            </p>
        </div>
     <?php $__env->endSlot(); ?>

    <div class="py-8">
        <div class="mx-auto max-w-7xl space-y-6 px-4 sm:px-6 lg:px-8">
            <div class="grid gap-4 sm:grid-cols-2 xl:grid-cols-4">
                <div class="rounded-2xl bg-white p-5 shadow-sm dark:bg-gray-800">
                    <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Jumlah Siswa</p>
                    <p class="mt-2 text-3xl font-bold text-gray-900 dark:text-white"><?php echo e($totalStudents); ?></p>
                </div>

                <div class="rounded-2xl bg-white p-5 shadow-sm dark:bg-gray-800">
                    <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Total Attempt</p>
                    <p class="mt-2 text-3xl font-bold text-gray-900 dark:text-white"><?php echo e($totalAttempts); ?></p>
                </div>

                <div class="rounded-2xl bg-white p-5 shadow-sm dark:bg-gray-800">
                    <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Rata-rata Kelas</p>
                    <p class="mt-2 text-3xl font-bold text-indigo-600 dark:text-indigo-400"><?php echo e(number_format($averageClassScore, 1)); ?></p>
                </div>

                <div class="rounded-2xl bg-white p-5 shadow-sm dark:bg-gray-800">
                    <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Pass Rate Kelas</p>
                    <p class="mt-2 text-3xl font-bold text-emerald-600 dark:text-emerald-400"><?php echo e(number_format($classPassRate, 1)); ?>%</p>
                </div>
            </div>

            <?php if($topStudent): ?>
                <div class="overflow-hidden rounded-2xl bg-gradient-to-r from-indigo-600 to-violet-600 p-6 text-white shadow-sm">
                    <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
                        <div>
                            <p class="text-sm font-semibold uppercase tracking-wider text-indigo-100">
                                Peringkat Teratas
                            </p>
                            <h3 class="mt-2 text-2xl font-black">
                                🏆 <?php echo e($topStudent['name']); ?>

                            </h3>
                            <p class="mt-1 text-sm text-indigo-100">
                                Rata-rata <?php echo e(number_format($topStudent['average_score'], 1)); ?> ·
                                <?php echo e($topStudent['attempts']); ?> attempt ·
                                pass rate <?php echo e(number_format($topStudent['pass_rate'], 1)); ?>%
                            </p>
                        </div>

                        <div class="rounded-2xl bg-white/15 px-6 py-4 text-center">
                            <p class="text-sm text-indigo-100">Nilai Terbaik</p>
                            <p class="mt-1 text-4xl font-black"><?php echo e($topStudent['best_score']); ?></p>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <div class="overflow-hidden rounded-2xl bg-white shadow-sm dark:bg-gray-800">
                <div class="border-b border-gray-200 px-6 py-5 dark:border-gray-700">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Peringkat Siswa</h3>
                    <p class="text-sm text-gray-500 dark:text-gray-400">
                        Data ini terbentuk dari hasil asesmen yang dikirim CLIForge Agent.
                    </p>
                </div>

                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                        <thead class="bg-gray-50 dark:bg-gray-900/40">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-semibold uppercase text-gray-500">Rank</th>
                                <th class="px-6 py-3 text-left text-xs font-semibold uppercase text-gray-500">Siswa</th>
                                <th class="px-6 py-3 text-center text-xs font-semibold uppercase text-gray-500">Attempt</th>
                                <th class="px-6 py-3 text-center text-xs font-semibold uppercase text-gray-500">Lulus</th>
                                <th class="px-6 py-3 text-center text-xs font-semibold uppercase text-gray-500">Pass Rate</th>
                                <th class="px-6 py-3 text-center text-xs font-semibold uppercase text-gray-500">Rata-rata</th>
                                <th class="px-6 py-3 text-center text-xs font-semibold uppercase text-gray-500">Terbaik</th>
                                <th class="px-6 py-3 text-left text-xs font-semibold uppercase text-gray-500">Aktivitas Terakhir</th>
                            </tr>
                        </thead>

                        <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                            <?php $__empty_1 = true; $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr class="hover:bg-gray-50 dark:hover:bg-gray-700/40">
                                    <td class="whitespace-nowrap px-6 py-4">
                                        <?php if($student['rank'] === 1): ?>
                                            <span class="text-2xl">🥇</span>
                                        <?php elseif($student['rank'] === 2): ?>
                                            <span class="text-2xl">🥈</span>
                                        <?php elseif($student['rank'] === 3): ?>
                                            <span class="text-2xl">🥉</span>
                                        <?php else: ?>
                                            <span class="inline-flex h-8 w-8 items-center justify-center rounded-full bg-gray-100 text-sm font-bold text-gray-700 dark:bg-gray-700 dark:text-gray-200">
                                                <?php echo e($student['rank']); ?>

                                            </span>
                                        <?php endif; ?>
                                    </td>

                                    <td class="px-6 py-4">
                                        <div class="font-semibold text-gray-900 dark:text-white"><?php echo e($student['name']); ?></div>
                                        <div class="text-xs text-gray-500"><?php echo e($student['email']); ?></div>
                                    </td>

                                    <td class="px-6 py-4 text-center text-sm font-semibold text-gray-700 dark:text-gray-300"><?php echo e($student['attempts']); ?></td>
                                    <td class="px-6 py-4 text-center text-sm font-semibold text-gray-700 dark:text-gray-300"><?php echo e($student['passed']); ?></td>

                                    <td class="px-6 py-4 text-center">
                                        <span class="rounded-full bg-emerald-100 px-3 py-1 text-xs font-bold text-emerald-700 dark:bg-emerald-900/40 dark:text-emerald-300">
                                            <?php echo e(number_format($student['pass_rate'], 1)); ?>%
                                        </span>
                                    </td>

                                    <td class="px-6 py-4 text-center text-lg font-black text-indigo-600 dark:text-indigo-400">
                                        <?php echo e(number_format($student['average_score'], 1)); ?>

                                    </td>

                                    <td class="px-6 py-4 text-center text-sm font-bold text-gray-900 dark:text-white"><?php echo e($student['best_score']); ?></td>

                                    <td class="px-6 py-4">
                                        <div class="text-sm font-medium text-gray-900 dark:text-white"><?php echo e($student['latest_lab']); ?></div>
                                        <div class="text-xs text-gray-500">Nilai <?php echo e($student['latest_score']); ?> · <?php echo e($student['latest_time']); ?></div>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr>
                                    <td colspan="8" class="px-6 py-14 text-center text-sm text-gray-500">
                                        Belum ada data asesmen siswa.
                                    </td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="rounded-2xl bg-indigo-50 p-5 text-sm leading-6 text-indigo-900 dark:bg-indigo-900/20 dark:text-indigo-200">
                <strong>Catatan:</strong> Papan peringkat digunakan sebagai fitur motivasi belajar.
                Ranking tidak menggantikan penilaian rubrik keterampilan praktik.
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
<?php /**PATH C:\xampp\htdocs\cliforge\resources\views/leaderboard/index.blade.php ENDPATH**/ ?>