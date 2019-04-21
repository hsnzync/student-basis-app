<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Programme;

class SubjectController extends Controller
{
    public function index(Request $request, $programme_slug)
    {
        $programmes = Programme::with('subjects', 'subjects.courses')->whereSlug($programme_slug)->get();

        return view('subject.index', compact('programmes'));
    }
}
