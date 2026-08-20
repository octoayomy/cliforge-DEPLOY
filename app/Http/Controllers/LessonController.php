<?php

namespace App\Http\Controllers;

use App\Models\Lesson;

class LessonController extends Controller
{
    // =========================
    // SHOW LESSON
    // =========================

    public function show($id)
    {
        $lesson = Lesson::findOrFail($id);

        return view('lessons.show', compact('lesson'));
    }
}