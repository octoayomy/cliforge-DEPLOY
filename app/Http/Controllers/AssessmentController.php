<?php

namespace App\Http\Controllers;

use App\Models\LabResult;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AssessmentController extends Controller
{
    public function index(Request $request): View
    {
        $user = Auth::user();

        $query = LabResult::query()
            ->with(['user', 'lab.course'])
            ->latest('id');

        if ($user->isStudent()) {
            $query->where('user_id', $user->id);
        }

        if ($request->filled('search')) {
            $search = trim((string) $request->input('search'));

            $query->where(function ($builder) use ($search) {
                $builder
                    ->whereHas('user', function ($userQuery) use ($search) {
                        $userQuery
                            ->where('name', 'like', "%{$search}%")
                            ->orWhere('email', 'like', "%{$search}%");
                    })
                    ->orWhereHas('lab', function ($labQuery) use ($search) {
                        $labQuery->where('title', 'like', "%{$search}%");
                    });
            });
        }

        if ($request->filled('status')) {
            $status = strtolower((string) $request->input('status'));

            if ($status === 'pass') {
                $query->where(function ($builder) {
                    $builder
                        ->where('score', '>=', 75)
                        ->orWhereIn('status', [
                            'pass',
                            'passed',
                            'success',
                            'completed',
                            'lulus',
                        ]);
                });
            }

            if ($status === 'fail') {
                $query
                    ->where('score', '<', 75)
                    ->whereNotIn('status', [
                        'pass',
                        'passed',
                        'success',
                        'completed',
                        'lulus',
                        'pending',
                    ]);
            }

            if ($status === 'pending') {
                $query->where('status', 'pending');
            }
        }

        $results = $query
            ->paginate(15)
            ->withQueryString();

        return view('assessment.index', compact('results'));
    }

    public function show(LabResult $labResult): View
    {
        $user = Auth::user();

        if ($user->isStudent() && $labResult->user_id !== $user->id) {
            abort(403, 'Anda hanya dapat melihat hasil assessment milik sendiri.');
        }

        $labResult->load([
            'user',
            'lab.course',
        ]);

        return view('assessment.show', compact('labResult'));
    }
}
