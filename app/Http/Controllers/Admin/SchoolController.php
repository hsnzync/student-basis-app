<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\School;
use Image;

class SchoolController extends Controller
{
    public function index()
    {
        $schools = School::orderBy('id', 'asc')->get();
        return view('admin.school.index', compact('schools'));
    }

    public function edit(School $school)
    {
        return view('admin.school.edit', compact('school'));
    }

    public function create()
    {

    }

    public function update(Request $request, School $school): RedirectResponse
    {
        if($request->hasFile('image_url')) {

            $image = $request->file('image_url');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            Image::make($image)->save(public_path('/uploads/schools/'. $filename));
            $school->image_url = $filename;
        }

        $school->title = $request->get('title');
        $school->location = $request->get('location');
        $school->slug = $request->get('slug');
        $school->update();
        
        return redirect()->route('school.index')->with('status', 'Information has been updated');
    }

    public function destroy()
    {
        
    }
}
