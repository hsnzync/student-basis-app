<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\CourseRequest;
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

    public function update(CourseRequest $request, $subject_id, Course $course): RedirectResponse
    {
        if($request->hasFile('image_url')) {
            $image = $request->file('image_url');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->save(public_path('/uploads/images/'. $filename));
            $course->image_url = $filename;
        }

        $course->title          = $request->title;
        $course->description    = $request->description;
        $course->slug           = $request->slug;
        $course->subject_id     = $subject_id;
        $course->is_active      = $request->is_active;
        $course->is_unlocked    = $request->is_unlocked;

        $course->save();

        return redirect()->route('admin.course.edit', [$subject_id, $course->id])->with('status', '"' . $course->title . '" is bijgewerkt!');
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

    public function store($subject_id, CourseRequest $request) : RedirectResponse
    {
        $course = new Course();
        $course->title          = $request->title;
        $course->description    = $request->description;
        $course->slug           = $request->slug;
        $course->subject_id     = $request->subject_id;
        $course->is_active      = $request->is_active;
        $course->is_unlocked    = $request->is_unlocked;
        $course->subject_id     = $subject_id;

        if($request->hasFile('image_url')) {

            $image = $request->file('image_url');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->save(public_path('/uploads/images/'. $filename));
            $course->image_url = $filename;
        }

        $course->save();

        return redirect()->route('admin.course.edit', [$subject_id, $course->id])->with('status', '"' . $course->title . '" is toegevoegd!');
    }

    public function destroy($subject_id, $course_id) : RedirectResponse
    {
        $course = Course::find($course_id);
        $course->delete();

        return redirect()->route('admin.course.index', [$subject_id, $course->id])->with('status', '"' . $course->title . '" is verwijderd!');
    }
}
