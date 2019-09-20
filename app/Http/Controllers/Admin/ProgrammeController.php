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

    public function update(ProgrammeRequest $request, Programme $programme): RedirectResponse
    {
        $programme->update($request->all());
        return redirect()->route('admin.programme.edit', $programme->id)->with('status', $programme->title . ' has been updated');
    }

    public function create()
    {
        $programme = new Programme();
        $schools = School::pluck('title', 'id');
        
        return view('admin.programme.edit', compact('programme', 'schools'));
    }

    public function store(ProgrammeRequest $request) : RedirectResponse
    {
        $programme = Programme::create($request->all());
        return redirect()->route('admin.programme.edit', $programme->id)->with('status', '"' . $programme->title . '" is toegevoegd!');
    }

    public function destroy($id) : RedirectResponse
    {
        $programme = Programme::find($id);
        $programme->delete();

        return redirect()->route('admin.programme.index')->with('status', '"' . $programme->title . '" is verwijderd!');
    }
}
