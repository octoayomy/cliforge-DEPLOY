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
                <?php echo e(auth()->user()->isAdmin() ? 'Assessment Siswa' : 'Hasil Assessment Saya'); ?>

            </h2>
            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                <?php echo e(auth()->user()->isAdmin()
                    ? 'Pantau seluruh hasil automated assessment siswa.'
                    : 'Lihat nilai, status, dan detail submission praktikum Anda.'); ?>

            </p>
        </div>
     <?php $__env->endSlot(); ?>

    <div class="py-8">
        <div class="mx-auto max-w-7xl space-y-5 px-4 sm:px-6 lg:px-8">
            <form method="GET" action="<?php echo e(route('assessment.index')); ?>" class="rounded-2xl bg-white p-4 shadow-sm dark:bg-gray-800">
                <div class="grid gap-3 md:grid-cols-[1fr_180px_auto]">
                    <input
                        type="text"
                        name="search"
                        value="<?php echo e(request('search')); ?>"
                        placeholder="<?php echo e(auth()->user()->isAdmin() ? 'Cari siswa atau lab...' : 'Cari nama lab...'); ?>"
                        class="rounded-lg border-gray-300 bg-white text-gray-900 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:border-gray-600 dark:bg-gray-900 dark:text-white"
                    >

                    <select
                        name="status"
                        class="rounded-lg border-gray-300 bg-white text-gray-900 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:border-gray-600 dark:bg-gray-900 dark:text-white"
                    >
                        <option value="">Semua status</option>
                        <option value="pass" <?php if(request('status') === 'pass'): echo 'selected'; endif; ?>>PASS</option>
                        <option value="fail" <?php if(request('status') === 'fail'): echo 'selected'; endif; ?>>FAIL</option>
                        <option value="pending" <?php if(request('status') === 'pending'): echo 'selected'; endif; ?>>PENDING</option>
                    </select>

                    <div class="flex gap-2">
                        <button type="submit" class="rounded-lg bg-indigo-600 px-4 py-2 text-sm font-semibold text-white hover:bg-indigo-700">
                            Filter
                        </button>

                        <a href="<?php echo e(route('assessment.index')); ?>" class="rounded-lg border border-gray-300 px-4 py-2 text-sm font-semibold text-gray-700 hover:bg-gray-50 dark:border-gray-600 dark:text-gray-200 dark:hover:bg-gray-700">
                            Reset
                        </a>
                    </div>
                </div>
            </form>

            <div class="overflow-hidden rounded-2xl bg-white shadow-sm dark:bg-gray-800">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                        <thead class="bg-gray-50 dark:bg-gray-900/40">
                            <tr>
                                <?php if(auth()->user()->isAdmin()): ?>
                                    <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">Siswa</th>
                                <?php endif; ?>
                                <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">Lab</th>
                                <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">Nilai</th>
                                <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">Status</th>
                                <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">Durasi</th>
                                <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">Submitted</th>
                                <th class="px-6 py-3 text-right text-xs font-semibold uppercase tracking-wider text-gray-500">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                            <?php $__empty_1 = true; $__currentLoopData = $results; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $result): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr class="hover:bg-gray-50 dark:hover:bg-gray-700/40">
                                    <?php if(auth()->user()->isAdmin()): ?>
                                        <td class="whitespace-nowrap px-6 py-4">
                                            <div class="font-medium text-gray-900 dark:text-white"><?php echo e($result->user?->name ?? '-'); ?></div>
                                            <div class="text-xs text-gray-500"><?php echo e($result->user?->email); ?></div>
                                        </td>
                                    <?php endif; ?>

                                    <td class="px-6 py-4">
                                        <div class="font-medium text-gray-900 dark:text-white"><?php echo e($result->lab?->title ?? '-'); ?></div>
                                        <div class="text-xs text-gray-500"><?php echo e($result->lab?->course?->title); ?></div>
                                    </td>

                                    <td class="px-6 py-4 text-lg font-bold text-gray-900 dark:text-white">
                                        <?php echo e($result->score); ?>

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
                                        <?php echo e($result->duration !== null ? $result->duration.' detik' : '-'); ?>

                                    </td>

                                    <td class="whitespace-nowrap px-6 py-4 text-sm text-gray-500">
                                        <?php echo e(($result->submitted_at ?? $result->created_at)?->format('d M Y H:i') ?? '-'); ?>

                                    </td>

                                    <td class="whitespace-nowrap px-6 py-4 text-right">
                                        <a href="<?php echo e(route('assessment.show', $result)); ?>" class="rounded-lg bg-indigo-50 px-3 py-2 text-sm font-semibold text-indigo-700 hover:bg-indigo-100 dark:bg-indigo-900/30 dark:text-indigo-300 dark:hover:bg-indigo-900/50">
                                            Detail Result
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr>
                                    <td colspan="<?php echo e(auth()->user()->isAdmin() ? 7 : 6); ?>" class="px-6 py-14 text-center text-sm text-gray-500">
                                        Tidak ada data assessment yang ditemukan.
                                    </td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>

                <?php if($results->hasPages()): ?>
                    <div class="border-t border-gray-200 px-6 py-4 dark:border-gray-700">
                        <?php echo e($results->links()); ?>

                    </div>
                <?php endif; ?>
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
<?php /**PATH C:\xampp\htdocs\cliforge\resources\views/assessment/index.blade.php ENDPATH**/ ?>