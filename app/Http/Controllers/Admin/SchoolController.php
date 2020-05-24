<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\SchoolRequest;
use Illuminate\Http\Request;
use App\Models\School;

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

    public function update(SchoolRequest $request, School $school): RedirectResponse
    {
        $school->update($request->all());
        return redirect()->route('admin.school.edit', $school->id)->with('status', '"' . $school->title . '" is bijgewerkt!');
    }

    public function create()
    {
        $school = new School();
        return view('admin.school.edit', compact('school'));
    }

    public function store(SchoolRequest $request) : RedirectResponse
    {
        $school = School::create($request->all());
        return redirect()->route('admin.school.edit', $school->id)->with('status', '"' . $school->title . '" is toegevoegd!');
    }


    public function destroy($id) : RedirectResponse
    {
        $school = School::find($id);
        $school->delete();

        return redirect()->route('school.index')->with('status', '"' . $school->title . '" is verwijderd!');
    }
}
