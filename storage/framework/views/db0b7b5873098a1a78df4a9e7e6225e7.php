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
        <h2 class="font-semibold text-2xl text-white leading-tight">
            Edit Lesson
        </h2>
     <?php $__env->endSlot(); ?>

    <div class="py-10 bg-gray-100 dark:bg-gray-900 min-h-screen">

        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white dark:bg-gray-800
                        rounded-3xl p-10 shadow-xl">

                <form action="/admin/lessons/<?php echo e($lesson->id); ?>"
                      method="POST"
                      class="space-y-6">

                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>

                    <!-- TITLE -->

                    <div>

                        <label class="block text-white mb-2">

                            Title

                        </label>

                        <input type="text"
                               name="title"
                               value="<?php echo e($lesson->title); ?>"
                               class="w-full rounded-2xl
                                      bg-gray-700 text-white
                                      border-none">

                    </div>

                    <!-- TYPE -->

                    <div>

                        <label class="block text-white mb-2">

                            Type

                        </label>

                        <select name="type"
                                class="w-full rounded-2xl
                                       bg-gray-700 text-white
                                       border-none">

                            <option value="theory"
                                <?php echo e($lesson->type == 'theory' ? 'selected' : ''); ?>>

                                Theory

                            </option>

                            <option value="lab"
                                <?php echo e($lesson->type == 'lab' ? 'selected' : ''); ?>>

                                Lab

                            </option>

                            <option value="quiz"
                                <?php echo e($lesson->type == 'quiz' ? 'selected' : ''); ?>>

                                Quiz

                            </option>

                        </select>

                    </div>

                    <!-- SECTION -->

                    <div>

                        <label class="block text-white mb-2">

                            Section

                        </label>

                        <select name="section_id"
                                class="w-full rounded-2xl
                                       bg-gray-700 text-white
                                       border-none">

                            <?php $__currentLoopData = $sections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <option value="<?php echo e($section->id); ?>"
                                    <?php echo e($lesson->section_id == $section->id ? 'selected' : ''); ?>>

                                    <?php echo e($section->title); ?>


                                </option>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </select>

                    </div>

                    <!-- CONTENT -->

                    <div>

                        <label class="block text-white mb-2">

                            Content

                        </label>

                        <textarea name="content"
                                  rows="5"
                                  class="w-full rounded-2xl
                                         bg-gray-700 text-white
                                         border-none"><?php echo e($lesson->content); ?></textarea>

                    </div>

                    <!-- DURATION -->

                    <div>

                        <label class="block text-white mb-2">

                            Duration

                        </label>

                        <input type="number"
                               name="duration"
                               value="<?php echo e($lesson->duration); ?>"
                               class="w-full rounded-2xl
                                      bg-gray-700 text-white
                                      border-none">

                    </div>

                    <!-- ORDER -->

                    <div>

                        <label class="block text-white mb-2">

                            Order

                        </label>

                        <input type="number"
                               name="order"
                               value="<?php echo e($lesson->order); ?>"
                               class="w-full rounded-2xl
                                      bg-gray-700 text-white
                                      border-none">

                    </div>

                    <!-- CHECKER COMMAND -->

                    <div>

                        <label class="block text-white mb-2">

                            Checker Command

                        </label>

                        <input type="text"
                               name="checker_command"
                               value="<?php echo e($lesson->checker_command); ?>"
                               class="w-full rounded-2xl
                                      bg-gray-700 text-white
                                      border-none">

                    </div>

                    <!-- CHECKER EXPECTED -->

                    <div>

                        <label class="block text-white mb-2">

                            Checker Expected

                        </label>

                        <input type="text"
                               name="checker_expected"
                               value="<?php echo e($lesson->checker_expected); ?>"
                               class="w-full rounded-2xl
                                      bg-gray-700 text-white
                                      border-none">

                    </div>

                    <!-- BUTTON -->

                    <button class="bg-yellow-500 hover:bg-yellow-600
                                   text-white px-8 py-4
                                   rounded-2xl font-bold">

                        Update Lesson

                    </button>

                </form>

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
<?php endif; ?><?php /**PATH C:\xampp\htdocs\cliforge\resources\views/admin/lessons/edit.blade.php ENDPATH**/ ?>