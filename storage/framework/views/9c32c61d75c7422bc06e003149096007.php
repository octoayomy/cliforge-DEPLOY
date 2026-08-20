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
            <h2 class="text-2xl font-bold text-gray-900 dark:text-white">
                Kelola Materi
            </h2>
            <p class="mt-1 text-sm text-gray-600 dark:text-gray-300">
                Kelola materi, kuis, lab, dan checker engine CLIForge.
            </p>
        </div>
     <?php $__env->endSlot(); ?>

    <div class="min-h-screen bg-gray-100 py-10 dark:bg-gray-900">
        <div class="mx-auto max-w-6xl space-y-8 px-4 sm:px-6 lg:px-8">

            <div class="rounded-3xl border border-gray-200 bg-white p-8 shadow-sm dark:border-gray-700 dark:bg-gray-800">
                <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                    <div>
                        <h1 class="text-3xl font-black text-gray-900 dark:text-white">
                            📚 Lesson Management
                        </h1>
                        <p class="mt-2 text-base text-gray-600 dark:text-gray-300">
                            Kelola lesson virtual lab dan checker engine.
                        </p>
                    </div>

                    <a href="<?php echo e(route('admin.lessons.create')); ?>"
                       class="inline-flex w-fit items-center justify-center rounded-xl bg-indigo-600 px-5 py-3 text-sm font-bold text-white hover:bg-indigo-700">
                        + Tambah Lesson
                    </a>
                </div>
            </div>

            <div class="overflow-hidden rounded-3xl border border-gray-200 bg-white shadow-sm dark:border-gray-700 dark:bg-gray-800">
                <div class="border-b border-gray-200 px-6 py-5 dark:border-gray-700">
                    <h3 class="text-lg font-bold text-gray-900 dark:text-white">
                        Daftar Materi
                    </h3>
                    <p class="mt-1 text-sm text-gray-600 dark:text-gray-300">
                        Data lesson yang akan tampil pada halaman kursus dan lab.
                    </p>
                </div>

                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                        <thead class="bg-gray-50 dark:bg-gray-900/40">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-bold uppercase tracking-wider text-gray-600 dark:text-gray-300">
                                    Judul
                                </th>
                                <th class="px-6 py-3 text-center text-xs font-bold uppercase tracking-wider text-gray-600 dark:text-gray-300">
                                    Tipe
                                </th>
                                <th class="px-6 py-3 text-center text-xs font-bold uppercase tracking-wider text-gray-600 dark:text-gray-300">
                                    Durasi
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-bold uppercase tracking-wider text-gray-600 dark:text-gray-300">
                                    Checker
                                </th>
                                <th class="px-6 py-3 text-right text-xs font-bold uppercase tracking-wider text-gray-600 dark:text-gray-300">
                                    Aksi
                                </th>
                            </tr>
                        </thead>

                        <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                            <?php $__empty_1 = true; $__currentLoopData = $lessons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $lesson): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr class="hover:bg-gray-50 dark:hover:bg-gray-700/40">
                                    <td class="px-6 py-5">
                                        <div class="font-bold text-gray-900 dark:text-white">
                                            <?php echo e($lesson->title); ?>

                                        </div>
                                        <div class="mt-1 line-clamp-2 max-w-md text-sm text-gray-600 dark:text-gray-300">
                                            <?php echo e($lesson->content); ?>

                                        </div>
                                    </td>

                                    <td class="px-6 py-5 text-center">
                                        <?php if($lesson->type === 'theory'): ?>
                                            <span class="rounded-full bg-green-100 px-3 py-1 text-xs font-bold text-green-700 dark:bg-green-900/40 dark:text-green-300">
                                                theory
                                            </span>
                                        <?php elseif($lesson->type === 'quiz'): ?>
                                            <span class="rounded-full bg-yellow-100 px-3 py-1 text-xs font-bold text-yellow-700 dark:bg-yellow-900/40 dark:text-yellow-300">
                                                quiz
                                            </span>
                                        <?php elseif($lesson->type === 'lab'): ?>
                                            <span class="rounded-full bg-purple-100 px-3 py-1 text-xs font-bold text-purple-700 dark:bg-purple-900/40 dark:text-purple-300">
                                                lab
                                            </span>
                                        <?php else: ?>
                                            <span class="rounded-full bg-gray-100 px-3 py-1 text-xs font-bold text-gray-700 dark:bg-gray-700 dark:text-gray-200">
                                                <?php echo e($lesson->type); ?>

                                            </span>
                                        <?php endif; ?>
                                    </td>

                                    <td class="px-6 py-5 text-center text-sm font-semibold text-gray-700 dark:text-gray-300">
                                        <?php echo e($lesson->duration ?? '-'); ?> menit
                                    </td>

                                    <td class="px-6 py-5">
                                        <code class="rounded-lg bg-gray-100 px-3 py-2 text-xs font-semibold text-gray-800 dark:bg-gray-900 dark:text-gray-200">
                                            <?php echo e($lesson->checker_command ?: '-'); ?>

                                        </code>
                                    </td>

                                    <td class="px-6 py-5 text-right">
                                        <div class="flex justify-end gap-2">
                                            <a href="<?php echo e(route('admin.lessons.edit', $lesson)); ?>"
                                               class="rounded-xl bg-amber-500 px-4 py-2 text-sm font-bold text-white hover:bg-amber-600">
                                                Edit
                                            </a>

                                            <form method="POST"
                                                  action="<?php echo e(route('admin.lessons.destroy', $lesson)); ?>"
                                                  onsubmit="return confirm('Hapus lesson ini?')">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('DELETE'); ?>

                                                <button type="submit"
                                                        class="rounded-xl bg-red-500 px-4 py-2 text-sm font-bold text-white hover:bg-red-600">
                                                    Delete
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr>
                                    <td colspan="5" class="px-6 py-14 text-center text-sm text-gray-600 dark:text-gray-300">
                                        Belum ada lesson. Klik tombol <strong>Tambah Lesson</strong> untuk membuat materi baru.
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
<?php endif; ?><?php /**PATH C:\xampp\htdocs\cliforge\resources\views/admin/lessons/index.blade.php ENDPATH**/ ?>