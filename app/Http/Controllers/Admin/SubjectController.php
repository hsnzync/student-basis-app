<?php

namespace App\Http\Controllers\Admin;

use Image;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\SubjectRequest;
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

    public function update(Request $request, Subject $subject): RedirectResponse
    {
        if($request->hasFile('image_url')) {

            $image = $request->file('image_url');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->save(public_path('/uploads/images/'. $filename));
            $subject->image_url = $filename;
        }
        
        $subject->title = $request->get('title');
        $subject->description = $request->get('description');
        $subject->slug = $request->get('slug');
        $subject->programme_id = $request->get('programme_id');
        $subject->is_active = $request->get('is_active');

        $subject->save();
        
        return redirect()->route('subject.edit', $subject->id)->with('status', '"' . $subject->title . '" is bijgewerkt!');
    }

    public function create()
    {
        $subject = new Subject();
        $programmes = Programme::pluck('title', 'id');
        return view('admin.subject.edit', compact('subject', 'programmes'));
    }

    public function store(SubjectRequest $request) : RedirectResponse
    {
        $subject = new Subject();
        $subject->title = $request->get('title');
        $subject->description = $request->get('description');
        $subject->slug = $request->get('slug');
        $subject->programme_id = $request->get('programme_id');

        if($request->hasFile('image_url')) {

            $image = $request->file('image_url');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->save(public_path('/uploads/subjects/'. $filename));
            $subject->image_url = $filename;
        }
        
        $subject->save();
        
        return redirect()->route('subject.edit', $subject->id)->with('status', '"' . $subject->title . '" is toegevoegd!');
    }

    public function destroy($id) : RedirectResponse
    {
        $subject = Subject::find($id);
        $subject->delete();

        return redirect()->route('subject.index')->with('status', '"' . $subject->title . '" is verwijderd!');
    }
}
