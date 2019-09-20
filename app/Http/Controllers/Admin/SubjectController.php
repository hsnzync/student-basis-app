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
use App\Models\Programme;

class SubjectController extends Controller
{
    public function index()
    {
        $subjects = Subject::with('programme')->orderBy('id', 'asc')->get();
        return view('admin.subject.index', compact('subjects'));
    }

    public function edit(Subject $subject)
    {
        $programmes = Programme::pluck('title', 'id');
        return view('admin.subject.edit', compact('subject', 'programmes'));
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
        $subject->programme_id  = $request->programme_id;
        $subject->is_active     = $request->is_active;

        $subject->save();
        
        return redirect()->route('admin.subject.edit', $subject->id)->with('status', '"' . $subject->title . '" is bijgewerkt!');
    }

    public function create()
    {
        $subject = new Subject();
        $programmes = Programme::pluck('title', 'id');
        return view('admin.subject.edit', compact('subject', 'programmes'));
    }

    public function store(CreateSubjectRequest $request) : RedirectResponse
    {
        $subject                = new Subject();
        $subject->title         = $request->title;
        $subject->description   = $request->description;
        $subject->slug          = $request->slug;
        $subject->programme_id  = $request->programme_id;
        $subject->is_active     = $request->is_active;

        if($request->hasFile('image_url')) {

            $image = $request->file('image_url');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->save(public_path('/uploads/images/'. $filename));
            $subject->image_url = $filename;
        }
        
        $subject->save();
        
        return redirect()->route('admin.subject.edit', $subject->id)->with('status', '"' . $subject->title . '" is toegevoegd!');
    }

    public function destroy($id) : RedirectResponse
    {
        $subject = Subject::find($id);
        $subject->delete();

        return redirect()->route('admin.subject.index')->with('status', '"' . $subject->title . '" is verwijderd!');
    }
}
