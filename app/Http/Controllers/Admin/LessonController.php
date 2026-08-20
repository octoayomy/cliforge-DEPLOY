<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Lesson;
use App\Models\Section;

use Illuminate\Http\Request;

class LessonController extends Controller
{
    // =========================
    // INDEX
    // =========================

    public function index()
    {
        $lessons = Lesson::with('section')
            ->latest()
            ->get();

        return view('admin.lessons.index', compact(
            'lessons'
        ));
    }

    // =========================
    // CREATE
    // =========================

    public function create()
    {
        $sections = Section::all();

        return view('admin.lessons.create', compact(
            'sections'
        ));
    }

    // =========================
    // STORE
    // =========================

    public function store(Request $request)
    {
        Lesson::create($request->all());

        return redirect('/admin/lessons')
            ->with('success', 'Lesson berhasil dibuat');
    }

    // =========================
    // EDIT
    // =========================

    public function edit($id)
    {
        $lesson = Lesson::findOrFail($id);

        $sections = Section::all();

        return view('admin.lessons.edit', compact(
            'lesson',
            'sections'
        ));
    }
    // =========================
    // SHOW
    // =========================

    public function show($id)
    {
        $lesson = Lesson::findOrFail($id);

        return redirect('/lessons/' . $lesson->id);
    }
    // =========================
    // UPDATE
    // =========================

    public function update(Request $request, $id)
    {
        $lesson = Lesson::findOrFail($id);

        $lesson->update($request->all());

        return redirect('/admin/lessons')
            ->with('success', 'Lesson berhasil diupdate');
    }

    // =========================
    // DELETE
    // =========================

    public function destroy($id)
    {
        $lesson = Lesson::findOrFail($id);

        $lesson->delete();

        return redirect('/admin/lessons')
            ->with('success', 'Lesson berhasil dihapus');
    }
    
}