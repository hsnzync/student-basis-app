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
    public function index()
    {
        $courses = Course::orderBy('id', 'asc')->get();
        return view('admin.course.index', compact('courses'));
    }

    public function edit(Course $course)
    {
        $subjects = Subject::pluck('title', 'id');
        return view('admin.course.edit', compact('course', 'subjects'));
    }

    public function update(CourseRequest $request, Course $course): RedirectResponse
    {
        if($request->hasFile('image_url')) {
            $image = $request->file('image_url');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->save(public_path('/uploads/images/'. $filename));
            $course->image_url = $filename;
        }

        $course->title = $request->get('title');
        $course->description = $request->get('description');
        $course->slug = $request->get('slug');
        $course->subject_id = $request->get('subject_id');

        $course->update();

        return redirect()->route('course.edit', $course->id)->with('status', '"' . $course->title . '" is bijgewerkt!');
    }

    public function show($subject_id)
    {
        $courses = Course::orderBy('id', 'asc')->where('subject_id', $subject_id)->get();
        return view('admin.course.index', compact('courses'));
    }

    public function create()
    {
        $course = new Course();
        $subjects = Subject::pluck('title', 'id');
        return view('admin.course.edit', compact('course', 'subjects'));
    }

    public function store(CourseRequest $request) : RedirectResponse
    {
        $course = new Course();
        $course->title = $request->get('title');
        $course->description = $request->get('description');
        $course->slug = $request->get('slug');
        $course->subject_id = $request->get('subject_id');

        if($request->hasFile('image_url')) {

            $image = $request->file('image_url');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->save(public_path('/uploads/images/'. $filename));
            $course->image_url = $filename;
        }
        
        $course->save();
        
        return redirect()->route('course.edit', $course->id)->with('status', '"' . $course->title . '" is toegevoegd!');
    }

    public function destroy($id) : RedirectResponse
    {
        $course = Course::find($id);
        $course->delete();

        return redirect()->route('course.index', $course->id)->with('status', '"' . $course->title . '" is verwijderd!');
    }
}
