<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Course\CreateCourseRequest;
use App\Http\Requests\Course\UpdateCourseRequest;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Subject;
use Image;

class CourseController extends Controller
{
    public function index($subject_id)
    {
        $courses = Course::orderBy('id', 'asc')->where('subject_id', $subject_id)->get();
        return view('admin.course.index', compact('courses', 'subject_id'));
    }

    public function edit($subject_id, Course $course)
    {
        return view('admin.course.edit', compact('course', 'subject_id'));
    }

    public function update(UpdateCourseRequest $request, $subject_id, Course $course): RedirectResponse
    {
        $course->title          = $request->title;
        $course->slug           = str_slug($request->title);
        $course->points         = $request->points;
        $course->subject_id     = $subject_id;
        $course->is_active      = $request->is_active;

        $course->save();

        return redirect()->route('admin.course.edit', [$subject_id, $course->id])->with('success', $course->title . ' is bijgewerkt.');
    }

    public function show($subject_id)
    {
        $courses = Course::orderBy('id', 'asc')->where('subject_id', $subject_id)->get();
        return view('admin.course.index', compact('courses'));
    }

    public function create($subject_id)
    {
        $course = new Course();
        return view('admin.course.edit', compact('course', 'subject_id'));
    }

    public function store($subject_id, CreateCourseRequest $request) : RedirectResponse
    {
        $course = new Course();
        $course->title          = $request->title;
        $course->slug           = str_slug($request->title);
        $course->points         = $request->points;
        $course->is_active      = $request->is_active;
        $course->subject_id     = $subject_id;

        $course->save();

        return redirect()->route('admin.course.edit', [$subject_id, $course->id])->with('success', $course->title . ' is toegevoegd.');
    }

    public function destroy($subject_id, $course_id) : RedirectResponse
    {
        $course = Course::find($course_id);
        $course->delete();

        return redirect()->route('admin.course.index', [$subject_id, $course->id])->with('error', $course->title . ' is verwijderd.');
    }
}
