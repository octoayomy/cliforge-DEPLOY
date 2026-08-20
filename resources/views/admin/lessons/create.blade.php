<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-white leading-tight">
            Tambah Lesson
        </h2>
    </x-slot>

    <div class="py-10 bg-gray-100 dark:bg-gray-900 min-h-screen">

        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white dark:bg-gray-800
                        rounded-3xl p-10 shadow-xl">

                <form action="/admin/lessons"
                      method="POST"
                      class="space-y-6">

                    @csrf

                    <!-- TITLE -->

                    <div>

                        <label class="block text-white mb-2">

                            Title

                        </label>

                        <input type="text"
                               name="title"
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

                            <option value="theory">Theory</option>
                            <option value="lab">Lab</option>
                            <option value="quiz">Quiz</option>

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

                            @foreach($sections as $section)

                                <option value="{{ $section->id }}">

                                    {{ $section->title }}

                                </option>

                            @endforeach

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
                                         border-none"></textarea>

                    </div>

                    <!-- DURATION -->

                    <div>

                        <label class="block text-white mb-2">

                            Duration

                        </label>

                        <input type="number"
                               name="duration"
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
                               class="w-full rounded-2xl
                                      bg-gray-700 text-white
                                      border-none">

                    </div>

                    <!-- BUTTON -->

                    <button class="bg-indigo-600 hover:bg-indigo-700
                                   text-white px-8 py-4
                                   rounded-2xl font-bold">

                        Simpan Lesson

                    </button>

                </form>

            </div>

        </div>

    </div>

</x-app-layout>