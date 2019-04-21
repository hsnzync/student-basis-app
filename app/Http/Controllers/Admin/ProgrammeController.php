<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\ProgrammeRequest;
use Illuminate\Http\Request;
use App\Models\Programme;
use App\Models\School;
use Image;

class ProgrammeController extends Controller
{
    public function index()
    {
        $programmes = Programme::with('school')->orderBy('id', 'asc')->get();
        return view('admin.programme.index', compact('programmes'));
    }

    public function edit(Programme $programme)
    {
        $schools = School::pluck('title', 'id');
        return view('admin.programme.edit', compact('programme', 'schools'));
    }

    public function update(Request $request, Programme $programme): RedirectResponse
    {
        if($request->hasFile('image_url')) {

            $image = $request->file('image_url');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->save(public_path('/uploads/programmes/'. $filename));
            $programme->image_url = $filename;
        }

        $programme->title = $request->get('title');
        $programme->description = $request->get('description');
        $programme->slug = $request->get('slug');

        $programme->update();
        
        return redirect()->route('programme.index')->with('status', 'Programme has been updated');
    }

    public function create(Programme $programme)
    {
        $schools = School::pluck('title', 'id');
        return view('admin.programme.create', compact('programme', 'schools'));
    }

    public function store(ProgrammeRequest $request) : RedirectResponse
    {
        $programme = new Programme();
        $programme->title = $request->get('title');
        $programme->description = $request->get('description');
        $programme->slug = $request->get('slug');
        $programme->school_id = $request->get('school_id');

        if($request->hasFile('image_url')) {

            $image = $request->file('image_url');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->save(public_path('/uploads/programmes/'. $filename));
            $programme->image_url = $filename;
        }
        
        $programme->save();
        
        return redirect()->route('programme.index')->with('status', 'Programme has been added');
    }

    public function destroy($slug) : RedirectResponse
    {
        $programme = Programme::whereSlug($slug);
        $programme->delete();

        return redirect()->route('programme.index')->with('status', 'Programme has been deleted');
    }
}
