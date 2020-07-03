<?php

namespace App\Http\Controllers\Api;

use DB;
use Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subject;
use App\Models\Course;
use App\Models\User;

class CourseController extends Controller
{
    /**
     * Load subjects
     *
     * @return view
     */

    public function getCourses(Request $request)
    {
        $subject_id = Subject::first()->id;
        if($request->has('subject')) {
            $subject_id = $request->get('subject');
        }

        $courses = DB::table('course')
            ->select('course.id', 'course.title as title', 'course.is_active', 'course.slug', 'course.hex', 'user_course.is_completed')
            ->leftJoin('user_course', 'course.id', 'course_id')
            ->where('user_course.user_id', auth()->user()->id)
            ->where('course.subject_id', $subject_id)
            ->where('course.is_active', true)
            ->orderBy('course.id', 'asc')
            ->get();

        // $count_courses = $courses->count();

        return response()->json([
            'courses' => $courses
            // 'loading_count'   => $count_courses
        ]);

    }
}
