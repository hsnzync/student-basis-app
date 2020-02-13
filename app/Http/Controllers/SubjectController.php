<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;
use App\Models\Grade;
use App\Models\User;

class SubjectController extends Controller
{
    public function index(Request $request)
    {
        // $user = User::where('id', auth()->user()->id)->active()->firstOrFail();
        $grade = Grade::find(auth()->user()->grade_id)->firstOrFail();
        $subjects = Subject::where('grade_id', $grade->id)->orderBy('created_at', 'asc')->active()->get();

        /**
         * TODO:
         * - Toon vak van de laatst updated course van pivot table subject_course
         */
        return view('platform.subject.index', compact('subjects'));
    }
}
