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
        if(auth()->user()->is_has_permission) {
            $programmes = Programme::with('school')->orderBy('id', 'asc')->get();
            return view('admin.programme.index', compact('programmes'));
        } else {
            abort(403, 'Unauthorized.');
        }
    }

    public function edit(Programme $programme)
    {
        if(auth()->user()->is_has_permission) {
            $schools = School::pluck('title', 'id');
            return view('admin.programme.edit', compact('programme', 'schools'));
        } else {
            abort(403, 'Unauthorized.');
        }
    }

    public function update(ProgrammeRequest $request, Programme $programme): RedirectResponse
    {
        if(auth()->user()->is_has_permission) {
            $programme->update($request->all());
            return redirect()->route('programme.index')->with('status', $programme->title . ' has been updated');
        } else {
            abort(403, 'Unauthorized.');
        }
    }

    public function create()
    {
        if(auth()->user()->is_has_permission) {
            $programme = new Programme();
            $schools = School::pluck('title', 'id');
            return view('admin.programme.edit', compact('programme', 'schools'));
        } else {
            abort(403, 'Unauthorized.');
        }
    }

    public function store(ProgrammeRequest $request) : RedirectResponse
    {
        if(auth()->user()->is_has_permission) {
            $programme = Programme::create($request->all());
            return redirect()->route('programme.edit', $programme->id)->with('status', '"' . $programme->title . '" is toegevoegd!');
        } else {
            abort(403, 'Unauthorized.');
        }
    }

    public function destroy($id) : RedirectResponse
    {
        if(auth()->user()->is_has_permission) {
            $programme = Programme::find($id);
            $programme->delete();

            return redirect()->route('programme.index')->with('status', '"' . $programme->title . '" is verwijderd!');
        } else {
            abort(403, 'Unauthorized.');
        }
    }
}
