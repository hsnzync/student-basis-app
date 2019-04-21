<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * Show the questions per course
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index($programme_slug, $subject_slug, $course_slug)
    {
        // dd('This course is: ' . $course_slug);
        dd('VueJS here');
        return view('question.index');
    } 
}
