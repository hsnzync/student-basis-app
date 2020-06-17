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
        $subject->description   = $request->description;
        $subject->slug          = $request->slug;
        $subject->is_active     = $request->is_active;

        $subject->save();

        return redirect()->route('admin.subject.edit', $subject->id)->with('success', '"' . $subject->title . '" is bijgewerkt!');
    }

    public function create()
    {
        $subject = new Subject();
        return view('admin.subject.edit', compact('subject'));
    }

    public function store(CreateSubjectRequest $request) : RedirectResponse
    {
        $subject                = new Subject();
        $subject->title         = $request->title;
        $subject->description   = $request->description;
        $subject->slug          = $request->slug;
        $subject->is_active     = $request->is_active;
        // REPLACE WITH PACKAGE THAT KEEPS TRACK OF THESE KIND OF THINGS!!
        $subject->created_by    = auth()->user()->id;

        if($request->hasFile('image_url')) {

            $image = $request->file('image_url');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->save(public_path('/uploads/images/'. $filename));
            $subject->image_url = $filename;
        }

        $subject->save();

        return redirect()->route('admin.subject.edit', $subject->id)->with('success', '"' . $subject->title . '" is toegevoegd!');
    }

    public function destroy($id) : RedirectResponse
    {
        $subject = Subject::find($id);
        $subject->delete();

        return redirect()->route('admin.subject.index')->with('error', '"' . $subject->title . '" is verwijderd!');
    }
}
