<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;

class OverviewController extends Controller
{
    public function index(Request $request)
    {
        // $user = User::where('id', auth()->user()->id)->active()->firstOrFail();
        $subjects = Subject::orderBy('created_at', 'asc')->orderBy('id')->active()->get();

        /**
         * TODO:
         * - Toon vak van de laatst updated course van pivot table subject_course
         */
        return view('platform.overview.index', compact('subjects'));
    }
}
