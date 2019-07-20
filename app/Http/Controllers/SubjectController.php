<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;
use App\Models\Programme;
use App\Models\User;

class SubjectController extends Controller
{
    public function index(Request $request)
    {
        // $user = User::where('id', auth()->user()->id)->active()->firstOrFail();
        
        $programme = Programme::find(auth()->user()->programme_id)->where('school_id', auth()->user()->school_id)->firstOrFail();
        $subjects = Subject::where('programme_id', $programme->id)->orderBy('created_at', 'asc')->active()->get();

        /**
         * TODO:
         * - Toon vak van de laatst updated course van pivot table subject_course
         */
        return view('subject.index', compact('subjects'));
    }
}
