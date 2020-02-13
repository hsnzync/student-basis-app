<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;
use App\Models\Course;

class CourseController extends Controller
{
    public function index(Request $request, $subject_slug)
    {
        $subjects = Subject::with('courses')->active()->whereSlug($subject_slug)->get();

        /**
         * TODO:
         * - pivot table subject_course
         * - laatste vak van ingelogde gebruiker tonen via pivot table (updated_at column)
         */

        return view('platform.course.index', compact('subjects'));
    }
}
