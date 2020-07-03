<?php

namespace App\Http\Controllers\Admin;

use Image;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Subject\CreateSubjectRequest;
use App\Http\Requests\Subject\UpdateSubjectRequest;
use Illuminate\Http\Request;
use App\Models\Subject;
use App\Models\School;
use App\Models\User;
use App\Models\Status;

class SubjectController extends Controller
{
    public function index()
    {
        $subjects = Subject::orderBy('id', 'asc')->get();
        return view('admin.subject.index', compact('subjects'));
    }

    public function edit(Subject $subject)
    {
        return view('admin.subject.edit', compact('subject'));
    }

    public function update(UpdateSubjectRequest $request, Subject $subject): RedirectResponse
    {
        if($request->hasFile('image_url')) {

            $image = $request->file('image_url');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->save(public_path('/uploads/images/'. $filename));
            $subject->image_url = $filename;
        }

        $subject->title         = $request->title;
        $subject->slug          = str_slug($request->title);
        $subject->is_active     = $request->is_active;

        $subject->save();

        return redirect()->route('admin.subject.edit', $subject->id)->with('success', $subject->title . ' is bijgewerkt.');
    }

    public function create()
    {
        $subject = new Subject();
        return view('admin.subject.edit', compact('subject'));
    }

    public function store(CreateSubjectRequest $request) : RedirectResponse
    {
        $status_available = Status::whereSlug('available')->first()->id;

        $subject                = new Subject();
        $subject->title         = $request->title;
        $subject->slug          = str_slug($request->title);
        $subject->is_active     = $request->is_active;

        if($request->hasFile('image_url')) {

            $image = $request->file('image_url');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->save(public_path('/uploads/images/'. $filename));
            $subject->image_url = $filename;
        }

        $students = User::orderBy('id', 'asc')
            ->whereHas('roles', function($query) {
                $query->where('slug', '=', 'student');
            })
            ->get();

        $subject->save();

        foreach($students as $key => $student) {
            // add subject and status to pivot
            $student->subjects()->attach($key, ['subject_id' => $subject->id, 'status_id' => $status_available]);
        }

        return redirect()->route('admin.subject.edit', $subject->id)->with('success', $subject->title . ' is toegevoegd.');
    }

    public function destroy($id) : RedirectResponse
    {
        $subject = Subject::find($id);
        $subject->delete();

        return redirect()->route('admin.subject.index')->with('error', $subject->title . ' is verwijderd.');
    }
}
