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
    public function index($slug)
    {
        dump('This course is: ' . $slug);
        dd('VueJS here');
        return view('platform.question.index');
    }
}
