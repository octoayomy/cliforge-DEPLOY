<?php

namespace App\Http\Controllers;

use App\Models\Progress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProgressController extends Controller
{
    // =========================
    // SAVE PROGRESS
    // =========================

    public function store(Request $request)
    {
        Progress::updateOrCreate(

            [
                'user_id' => Auth::id(),
                'lesson_id' => $request->lesson_id,
            ],

            [
                'score' => $request->score,
                'completed' => true,
            ]

        );

        return response()->json([
            'success' => true
        ]);
    }
}