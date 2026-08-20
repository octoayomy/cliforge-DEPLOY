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
        <div class="text-center">
            <h2 class="text-4xl font-black tracking-tight text-gray-900 dark:text-white">
                Kursus Tersedia
            </h2>
            <p class="mt-3 text-lg text-gray-600 dark:text-gray-300">
                Pilih kursus yang sesuai dengan kebutuhan praktik administrasi sistem jaringan.
            </p>
        </div>
     <?php $__env->endSlot(); ?>

    <div class="py-10">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="grid gap-8 md:grid-cols-2 xl:grid-cols-3">
                <?php $__empty_1 = true; $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="relative overflow-hidden rounded-3xl border border-gray-200 bg-white p-7 text-gray-900 shadow-xl transition duration-300 hover:-translate-y-1 hover:shadow-2xl dark:border-gray-700 dark:bg-gray-800 dark:text-white">
                        <div class="absolute -right-10 -top-10 h-32 w-32 rounded-full bg-indigo-100 dark:bg-indigo-900/40"></div>
                        <div class="absolute -right-4 top-24 h-28 w-28 rounded-full bg-blue-50 dark:bg-blue-900/30"></div>

                        <div class="relative z-10">
                            <span class="inline-flex rounded-full bg-indigo-100 px-4 py-1 text-xs font-bold text-indigo-700 dark:bg-indigo-900/50 dark:text-indigo-200">
                                <?php echo e($course['category']); ?>

                            </span>

                            <h3 class="mt-7 text-2xl font-black text-gray-900 dark:text-white">
                                <?php echo e($course['title']); ?>

                            </h3>

                            <p class="mt-4 text-sm leading-6 text-gray-600 dark:text-gray-300">
                                <?php echo e($course['description'] ?? 'Materi dan virtual lab Administrasi Sistem Jaringan.'); ?>

                            </p>

                            <p class="mt-8 text-sm font-semibold text-gray-600 dark:text-gray-300">
                                <?php echo e($course['total_items']); ?> aktivitas belajar
                            </p>

                            <div class="mt-4">
                                <div class="mb-2 flex items-center justify-between text-sm font-bold text-gray-700 dark:text-gray-200">
                                    <span><?php echo e($course['completed_items']); ?>/<?php echo e($course['total_items']); ?> selesai</span>
                                    <span><?php echo e($course['percent']); ?>%</span>
                                </div>

                                <div class="h-2 overflow-hidden rounded-full bg-gray-200 dark:bg-gray-700">
                                    <div class="h-full rounded-full bg-indigo-600" style="width: <?php echo e($course['percent']); ?>%"></div>
                                </div>
                            </div>

                            <a href="<?php echo e(route('courses.show', $course['id'])); ?>"
                               class="mt-8 flex items-center justify-between rounded-full bg-indigo-600 px-5 py-4 text-sm font-bold text-white transition hover:bg-indigo-700">
                                <span>Mulai Kursus</span>
                                <span class="flex h-9 w-9 items-center justify-center rounded-full bg-white text-gray-900">
                                    →
                                </span>
                            </a>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <div class="col-span-full rounded-2xl bg-white p-10 text-center shadow-sm dark:bg-gray-800">
                        <h3 class="text-lg font-bold text-gray-900 dark:text-white">Belum ada kursus.</h3>
                        <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">Tambahkan course melalui seeder atau menu admin.</p>
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
<?php endif; ?><?php /**PATH C:\xampp\htdocs\cliforge\resources\views/courses/index.blade.php ENDPATH**/ ?>