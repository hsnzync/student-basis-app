<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;

class CourseController extends Controller
{
    public function index(Request $request, $subject_slug)
    {
        $subjects = Subject::with('courses')->whereSlug($subject_slug)->get();

        return view('course.index', compact('subjects'));   
    }
}
