<?php

namespace App\Http\Controllers\Api;

use Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;

class CourseController extends Controller
{
    /**
     * Load subjects
     *
     * @return view
     */

    public function getCourses(Request $request)
    {
        $subject = 1;
        if($request->has('subject')) {
            $subject = $request->get('subject');
        }


        $courses = Course::where('subject_id', $subject)->with('user')->active()->orderBy('id', 'asc')->get();
        // $courses = auth()->user()->courses;
        // $count_courses = $courses->count();


        return response()->json([
            'courses'         => $courses
            // 'loading_count'   => $count_courses
        ]);

    }
}
