<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\GradeRequest;
use Illuminate\Http\Request;
use App\Models\Grade;

class GradeController extends Controller
{
    public function index()
    {
        $grades = Grade::orderBy('id', 'asc')->get();
        return view('admin.grade.index', compact('grades'));
    }

    public function edit(Grade $grade)
    {
        return view('admin.grade.edit', compact('grade'));
    }

    public function update(GradeRequest $request, Grade $grade): RedirectResponse
    {
        $grade->update($request->all());
        return redirect()->route('admin.grade.edit', $grade->id)->with('status', $grade->title . ' has been updated');
    }

    public function create()
    {
        $grade = new Grade();

        return view('admin.grade.edit', compact('grade'));
    }

    public function store(GradeRequest $request) : RedirectResponse
    {
        $grade = Grade::create($request->all());
        return redirect()->route('admin.grade.edit', $grade->id)->with('status', '"' . $grade->title . '" is toegevoegd!');
    }

    public function destroy($id) : RedirectResponse
    {
        $grade = Grade::find($id);
        $grade->delete();

        return redirect()->route('admin.grade.index')->with('status', '"' . $grade->title . '" is verwijderd!');
    }
}
