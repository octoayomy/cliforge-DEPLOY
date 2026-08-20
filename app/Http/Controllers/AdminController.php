<?php

namespace App\Http\Controllers;

use App\Models\Progress;

class AdminController extends Controller
{
    public function index()
    {
        $progresses = Progress::with([
            'user',
            'lesson'
        ])->latest()->get();

        return view('admin.dashboard', compact(
            'progresses'
        ));
    }
}