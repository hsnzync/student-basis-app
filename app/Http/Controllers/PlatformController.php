<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;
use DB;

class PlatformController extends Controller
{
    public function index()
    {
        $subjects = DB::table('subject')
            ->select('subject.id', 'subject.is_active', 'pivot.is_completed')
            ->leftJoin('user_subject as pivot', 'subject.id', 'pivot.subject_id')
            ->where('user_id', auth()->user()->id)
            ->where('subject.is_active', true)
            ->orderBy('subject.id', 'asc')
            ->get();

        $subjects_total = $subjects->count();
        $subjects_completed = $subjects->whereIn('is_completed', true)->count();
        $subjects_not_completed = $subjects->whereIn('is_completed', false)->count();

        $count_subjects = new Subject;
        $count_subjects->total = $subjects_total;
        $count_subjects->completed = $subjects_completed;
        $count_subjects->not_completed = $subjects_not_completed;

        $subject = Subject::orderBy('id', 'asc')->first();

        return view('platform.index', compact('count_subjects', 'subject'));
    }
}
