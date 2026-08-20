<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Lab;
use Illuminate\Http\Request;

class LabController extends Controller
{
    // =========================
    // STORE LAB
    // =========================

    public function store(Request $request, $courseId)
    {
        $request->validate([
            'title' => 'required',
            'instruction' => 'required',
        ]);

        Lab::create([
            'course_id' => $courseId,
            'title' => $request->title,
            'instruction' => $request->instruction,
            'checker_script' => $request->checker_script,
            'max_score' => $request->max_score ?? 100,
        ]);

        return back()->with('success', 'Lab berhasil ditambahkan');
    }

    // =========================
    // DELETE LAB
    // =========================

    public function destroy($id)
    {
        $lab = Lab::findOrFail($id);

        $lab->delete();

        return back()->with('success', 'Lab berhasil dihapus');
    }
}